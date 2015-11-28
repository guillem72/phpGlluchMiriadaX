<?php
	$xslDoc = new DOMDocument();
   	$xslDoc->load("miriada.xslt");

   	$xmlDoc = new DOMDocument();
   	@$xmlDoc->loadHTMLFile("samples/reda.html");
	$xmlDoc->save("redaValid.html");
   	$proc = new XSLTProcessor();
   	$proc->importStylesheet($xslDoc);
   	echo $proc->transformToXML($xmlDoc);

?>
