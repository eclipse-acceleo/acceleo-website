<?php
	$pageKeywords	= "acceleo, dsl, modeling, domain specific language, textual, generator, code generator, emf, mofm2t, dsl, metamodel, free, open source, uml";
	$pageAuthor		= "Obeo";
	$pageTitle 		= "Acceleo";
	$pageTitle 		= "Acceleo";

	$html = file_get_contents('_index.html');
	
	# Generate the web page
	$App->AddExtraHtmlHeader('<link href="https://plus.google.com/114651471803085159652/" rel="publisher" />' . "\n\t");
	$App->generatePage($theme, $Menu, null, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
