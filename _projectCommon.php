<?php

	# Set the theme for your project's web pages.
	# See the Committer Tools "How Do I" for list of themes
	# https://dev.eclipse.org/committers/
	# Optional: defaults to system theme 
	$theme = "Nova";
	

	
	$pageKeywords	= "acceleo, dsl, modeling, domain specific language, textual, generator, code generator, emf, mofm2t, dsl, metamodel, free, open source, uml";
	$pageAuthor		= "Obeo";
	$pageTitle 		= "Acceleo";

	$Menu->setMenuItemList(array());
	$Menu->addMenuItem("Home", "/acceleo", "_self");
	$Menu->addMenuItem("Download", "/acceleo/downloads", "_self");
	$Menu->addMenuItem("Support", "/acceleo/support", "_self");
	$Menu->addMenuItem("Developers", "/acceleo/developers", "_self");
	
	$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/acceleo/style_acceleo.css"/>' . "\n\t");
	
	$App->Promotion = TRUE;

	$App->SetGoogleAnalyticsTrackingCode("UA-16777490-1");
?>
