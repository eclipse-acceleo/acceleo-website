<?php  
	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");
	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");
	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php");

	$App 	= new App();
	$Nav	= new Nav();
	$Menu 	= new Menu();

	include($App->getProjectCommon());

	$pageKeywords	= "acceleo, dsl, modeling, domain specific language, textual, generator, code generator, emf, mofm2t, dsl, metamodel, free, open source, uml";
	$pageAuthor		= "Obeo";
	$pageTitle 		= "Acceleo";

	$Nav->setLinkList(array());
	$Nav->addNavSeparator("About this project", "https://projects.eclipse.org/projects/modeling.acceleo", "", 1  );
	$Nav->addCustomNav("Wiki", "http://wiki.eclipse.org/Acceleo", 	"_self", 2);
	$Nav->addCustomNav("Newsgroup", "http://www.eclipse.org/forums/index.php?t=thread&frm_id=24&", "_self", 2);
	$Nav->addCustomNav("Project Plan", "https://projects.eclipse.org/projects/modeling.m2t.acceleo/documentation", "_self", 2);
	$Nav->addCustomNav("Bugs", "https://bugs.eclipse.org/bugs/buglist.cgi?bug_status=UNCONFIRMED&bug_status=NEW&bug_status=ASSIGNED&bug_status=REOPENED&bug_status=VERIFIED&list_id=9161179&product=Acceleo&query_format=advanced", 	"_self", 2);
	$Nav->addCustomNav("File a Bug", "https://bugs.eclipse.org/bugs/enter_bug.cgi?product=Acceleo", 	"_self", 2);

	$Nav->addNavSeparator("Developers", "https://projects.eclipse.org/projects/modeling.m2t.acceleo/developer", "", 1  );
	$Nav->addCustomNav("Git", "http://git.eclipse.org/c/acceleo/org.eclipse.acceleo.git/", "_self", 2);
	$Nav->addCustomNav("Gerrit", "https://git.eclipse.org/r/#/admin/projects/acceleo/org.eclipse.acceleo", "_self", 2);
	$Nav->addCustomNav("Mailing List", "https://dev.eclipse.org/mailman/listinfo/m2t-dev", "_self", 2);

	$Nav->addNavSeparator("Related Projects", "https://www.eclipse.org/modeling", "", 1  );
	$Nav->addCustomNav("EMF", "https://www.eclipse.org/modeling/emf", "_self", 2);
	$Nav->addCustomNav("Sirius", "https://www.eclipse.org/sirius", "_self", 2);	

	$html = file_get_contents('_index.html');
	
	# Generate the web page
	$App->AddExtraHtmlHeader('<link href="https://plus.google.com/114651471803085159652/" rel="publisher" />' . "\n\t");
	$App->generatePage($theme, $Menu, null, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
