<?php

	# Set the theme for your project's web pages.
	# See the Committer Tools "How Do I" for list of themes
	# https://dev.eclipse.org/committers/
	# Optional: defaults to system theme 
	$theme = "Nova";
	

	# Define your project-wide Nav bars here.
	# Format is Link text, link URL (can be http://www.someothersite.com/), target (_self, _blank), level (1, 2 or 3)
	# these are optional
	$Nav->setLinkList(array());
	$Nav->addNavSeparator("Acceleo", 	"/acceleo");
	$Nav->addCustomNav("Download", "http://eclipse.org/modeling/m2t/downloads/?project=acceleo", "_self", 3);
	$Nav->addCustomNav("Documentation", "/acceleo/documentation", "_self", 3);
	$Nav->addCustomNav("Support", "/acceleo/support", "_self", 3);
	$Nav->addCustomNav("Getting Involved", "/acceleo/developers", "_self", 3);
	
	$pageKeywords	= "acceleo, dsl, modeling, domain specific language, textual";
	$pageAuthor		= "Obeo";
	$pageTitle 		= "Acceleo";

	$Menu->setMenuItemList(array());
	$Menu->addMenuItem("Home", "/acceleo", "_self");
	$Menu->addMenuItem("Download", "http://eclipse.org/modeling/m2t/downloads/?project=acceleo", "_self");
	$Menu->addMenuItem("Documentation", "/acceleo/documentation", "_self");
	$Menu->addMenuItem("Support", "/acceleo/support", "_self");
	$Menu->addMenuItem("Developers", "/acceleo/developers", "_self");
	
	$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/acceleo/style_nova.css"/>' . "\n\t");
	$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="style_acceleo.css"/>' . "\n\t");
	
	$App->Promotion = TRUE;

	$App->SetGoogleAnalyticsTrackingCode("UA-16777490-1");
?>
