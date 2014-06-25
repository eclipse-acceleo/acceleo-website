<?php

	# Set the theme for your project's web pages.
	# See the Committer Tools "How Do I" for list of themes
	# https://dev.eclipse.org/committers/
	# Optional: defaults to system theme
	$theme = "solstice";

	# Define your project-wide Nav bars here.
	# Format is Link text, link URL (can be http://www.someothersite.com/), target (_self, _blank), level (1, 2 or 3)
	# these are optional

	$Menu->setMenuItemList(array());
	$Menu->addMenuItem("Home", "/acceleo", "_self");
	$Menu->addMenuItem("Download", "/acceleo/downloads", "_self");
	$Menu->addMenuItem("Support", "/acceleo/support", "_self");
	$Menu->addMenuItem("Developers", "/acceleo/developers", "_self");
	
	# $App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/acceleo/style_acceleo.css"/>' . "\n\t");
	
	$App->Promotion = TRUE;

	$App->SetGoogleAnalyticsTrackingCode("UA-16777490-1");
?>
