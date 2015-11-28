<?php
require('html2text.php');
$filename="samples/html5.html";
$doc=new DOMDocument();
$doc->loadHTMLFile($filename);
$xpath = new DOMXPath($doc);
$textVersion = html2text( $filename, false, true );
echo $textVersion;

?>
