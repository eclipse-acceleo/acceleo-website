<?php

	# Set the theme for your project's web pages.
	# See the Committer Tools "How Do I" for list of themes
	# https://dev.eclipse.org/committers/
	# Optional: defaults to system theme 
	# $_theme = "solstice";
	$theme = "solstice";

	# Define your project-wide Nav bars here.
	# Format is Link text, link URL (can be http://www.someothersite.com/), target (_self, _blank), level (1, 2 or 3)
	# these are optional
	# $Nav->setLinkList(array());
	# $Nav->addNavSeparator("About this project", "https://projects.eclipse.org/projects/modeling.acceleo", "", 1  );
	# $Nav->addCustomNav("Wiki", "http://wiki.eclipse.org/Acceleo", 	"_self", 2);
	# $Nav->addCustomNav("Newsgroup", "http://www.eclipse.org/forums/index.php?t=thread&frm_id=24&", "_self", 2);
	# $Nav->addCustomNav("Project Plan", "https://projects.eclipse.org/projects/modeling.m2t.acceleo/documentation", "_self", 2);
	# $Nav->addCustomNav("Bugs", "https://bugs.eclipse.org/bugs/buglist.cgi?bug_status=UNCONFIRMED&bug_status=NEW&bug_status=ASSIGNED&bug_status=REOPENED&bug_status=VERIFIED&list_id=9161179&product=Acceleo&query_format=advanced", 	"_self", 2);
	# $Nav->addCustomNav("File a Bug", "https://bugs.eclipse.org/bugs/enter_bug.cgi?product=Acceleo", 	"_self", 2);

	# $Nav->addNavSeparator("Developers", "https://projects.eclipse.org/projects/modeling.m2t.acceleo/developer", "", 1  );
	# $Nav->addCustomNav("Git", "http://git.eclipse.org/c/acceleo/org.eclipse.acceleo.git/", "_self", 2);
	# $Nav->addCustomNav("Gerrit", "https://git.eclipse.org/r/#/admin/projects/acceleo/org.eclipse.acceleo", "_self", 2);
	# $Nav->addCustomNav("Mailing List", "https://dev.eclipse.org/mailman/listinfo/m2t-dev", "_self", 2);

	# $Nav->addNavSeparator("Related Projects", "https://www.eclipse.org/modeling", "", 1  );
	# $Nav->addCustomNav("EMF", "https://www.eclipse.org/modeling/emf", "_self", 2);
	# $Nav->addCustomNav("Sirius", "https://www.eclipse.org/sirius", "_self", 2);

	# $Menu->setMenuItemList(array());
	# $Menu->addMenuItem("Home", "/acceleo", "_self");
	# $Menu->addMenuItem("Download", "/acceleo/downloads", "_self");
	# $Menu->addMenuItem("Support", "/acceleo/support", "_self");
	# $Menu->addMenuItem("Developers", "/acceleo/developers", "_self");
	
	# $App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/acceleo/style_acceleo.css"/>' . "\n\t");
	
	$App->Promotion = TRUE;

	# $App->SetGoogleAnalyticsTrackingCode("UA-16777490-1");
?>
