<?php
// Configuration of the rss2html utility
$limitItem = 5;
$limitTitleLength = 15;
$limitDescriptionLength = 30;
$feedURL = "http://www.acceleo.org/planet/rss20.xml";

// Global variables used throughout the script
$readError = "";

Function rss2html() {
	$result = "";
	$xmlString = readFeed();
	if ($xmlString == NULL) {
		$result = $readError;
		return $result;
	}

	$xmlParser = xml_parser_create();
	$rssParser = new RSSParser();
	xml_set_object($xmlParser, $rssParser);
	xml_set_element_handler($xmlParser, "startElement", "endElement");
	xml_set_character_data_handler($xmlParser, "characterData");
	$parseResult = xml_parse($xmlParser, $xmlString, TRUE);
	if ($parseResult == 0) {
		$result = xml_error_string(xml_get_error_code($xmlParser));
		$result .= "\nat ".xml_get_current_line_number($xmlParser);
		$result .= ":".xml_get_current_column_number($xmlParser);
		return $result;
	}
	
	$itemCount = min($limitItem, count($rssParser->items));
	
	if ($itemCount > 0) {
		$result = "<h3><a href=\"".$rssParser->feed->link."\">".$rssParser->feed->title."</a></h3>\n";
		$result .= "<ul>\n";
		for ($i = 0; $i < $itemCount; $i++) {
			$item = $rssParser->items[$i];
			$result .= "<li>";
			$result .= "<div id=\"meta\">".$item->pubDate_time."</div>";
			$result .= "<a href=\"".$item->link."\" display=\"block\">".limitLength($item->title, $limitTitleLength)."</a>";
			$result .= limitLength($item->description, $limitDescriptionLength);
			$result .= "</li>\n";
		}
		$result .= "</ul>\n";
	}
	
	// debug
	$result = "<h3>debug</h3>";
	$result .= $xmlString;
	return $result;
}

/*
 * Reads the feed denoted by URL $feedURL in memory. Any error will be logged within $readError.
 */
Function readFeed() {
	$result = "";

	$curlHandle = curl_init();
	curl_setopt($curlHandle, CURLOPT_URL, $feedURL);
	curl_setopt($curlHandle, CURLOPT_HEADER, 0);
	curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curlHandle, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.0.1;) Gecko/2008070208 Firefox/3.0.1");
	curl_setopt($curlHandle, CURLOPT_REFERER, $feedURL);
	curl_setopt($curlHandle, CURLOPT_CONNECTTIMEOUT, 5000);
	curl_setopt($curlHandle, CURLOPT_MAXREDIRS, 10);
	curl_setopt($curlHandle, CURLOPT_ENCODING, 'identity');
	
	$result = curl_exec($curlHandle);
	if (curl_errno($curlHandle)) {
		$readError = curl_error($curlHandle);
		curl_close($curlHandle);
		return NULL;
	}
	
	$httpResponse = curl_getinfo($curlHandle, CURLINFO_HTTP_CODE);
	if ($httpResponse < 200 || $httpResponse >= 300) {
		$readError = "HTTP ERROR: $httpResponse";
		curl_close($curlHandle);
		return NULL;
	}
	
	curl_close($curlHandle);
	return $result;
}

/*
 * Limit the length of the given String to the given number of characters.
 */
Function limitLength($initialValue, $limit = -1) {
	if ($limit == -1 || strlen($initialValue) <= $limit) {
		return $initialValue;
	}

	$result = substr($initialValue, 0, $limit);

	$lastSpace = strrchr($result, ' ');
	if ($lastSpace != FALSE) {
		$result = substr($result, 0, -strlen($lastSpace));
		$result .= " [...]";
	}

	return $result;
}

class RSSParser {
	var $tag = "";
	var $currentItem = NULL;
	var $insideChannel = FALSE;
	var $insideItem = FALSE;

	var $feed;
	var $items = Array();

	function startElement($parser, $tagName, $attrs) {
		$this->tag = $tagName;
		if ($tagName == "ITEM") {
			$this->insideItem = TRUE;
			$this->currentItem = new RSSItem();
		} elseif ($tagName == "CHANNEL") {
			$this->insideChannel = TRUE;
			$this->feed = new Feed();
		}
	}

	function endElement($parser, $tagName) {
		$this->tag = "";
		if ($tagName == "ITEM") {
			$this->currentItem->pubDate = trim($this->currentItem->pubDate);
			$this->currentItem->title = trim($this->currentItem->title);
			$this->currentItem->description = trim($this->currentItem->description);
			$this->currentItem->link = trim($this->currentItem->link);
			$this->currentItem->author = trim($this->currentItem->author);
			
			$this->currentItem->pubDate_time = strtotime($this->currentItem->pubDate);

			$this->items[] = $this->currentItem;

			$this->insideItem = FALSE;
		} elseif ($tagName == "CHANNEL") {
			$this->feed->title = trim($this->feed->title);
			$this->feed->link = trim($this->feed->link);
			
			$this->insideChannel = FALSE;
		}
	}

	function characterData($parser, $data) {
		if ($data != NULL && $data != "" && ($this->insideItem || $this->insideChannel)) {
			switch ($this->tag) {
				case "TITLE":
					if ($this->insideItem) {
						$this->currentItem->title .= $data;
					} else if ($this->insideChannel) {
						$this->feed->title .= $data;
					}
					break;

				case "DESCRIPTION":
					if ($this->insideItem) {
						$this->currentItem->description .= $data;
					}
					break;

				case "LINK":
					if ($this->insideItem) {
						$this->currentItem->link .= $data;
					} else if ($this->insideChannel) {
						$this->feed->link .= $data;
					}
					break;

				case "PUBDATE":
					$this->currentItem->pubDate .= $data;
					break;

				case "AUTHOR":
					$this->currentItem->author .= $data;
					break;

				default:
			}
		}
	}
}

class Feed {
	var $title = "";
	var $link = "";
}

class RSSItem {
	var $title = "";
	var $description = "";
	var $link = "";
	var $pubDate = "";
	var $pubDate_time = 0;
	var $author = "";
}
?>