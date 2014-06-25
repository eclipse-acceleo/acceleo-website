<?php  																														
	include("script/rss2html.php");
	
	$html = file_get_contents('_index.html');
	
	$newsConverter = new RSS2HTML();
	$news = $newsConverter->convert();
	$html = str_replace("%%HEADLINES%%", $news, $html);

	# Generate the web page
	$App->AddExtraHtmlHeader('<link href="https://plus.google.com/114651471803085159652/" rel="publisher" />' . "\n\t");
	$App->generatePage($theme, $Menu, null, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
