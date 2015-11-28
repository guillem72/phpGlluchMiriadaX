<?php
$miriada=new Course();
 

class Course {
	
$params=array("description","contents","instructors","length","effort","prices","institutions","subjects","language","url","title","keywords");

$quitar=array
("description" => "Descripción de curso ",
"contents",
"instructors",
"length",
"effort",
"prices",
"institutions",
"subjects",
"language",
"url",
"title",
"keywords"
);

$query=array(
"description" => '//div[@id="p_p_id_coursedescription_WAR_liferaylmsportlet_"]',
"contents",
"instructors",
"length",
"effort",
"prices",
"institutions",
"subjects",
"language",
"url",
"title",
"keywords"
);

function get_info_course($filename)
{
	$devolver=array();
	$doc = new DOMDocument();
	@$doc->loadHTMLFile($filename);
	$val=false;
	foreach ($params as $param)
	{
		$val=get_part($param,$doc);
		if ($val) $devolver[$param]=$val;
	}
	return $devolver;
}

function get_part($part,$doc)
{
	$xpath = new DOMXPath($doc);
	//echo "\nDOM";
	//var_dump($doc);
	if (!$query[$part]) return false;//there isn't a defined query for this element
	
	$items = $xpath->query($query[$part]);
	
	$valor=false;
	if (!$items) return false;//TODO warning
	foreach ($items as $item) 
	{
		$valor[]=trim(explode($quitar[$part],$item->nodeValue)[1]);
	}
	if($valor)
	{
		if (count($valor)==1)//the result has only one element
		{
			$valor=$valor[0];
		}		
	}
		
	//return $description;
	return $valor;
}
}//end of class
?>
