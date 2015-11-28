<?php

 
require_once('html2text.php');
class Course {

public $no_xpath=array("requirements");


protected $params=array("description","contents","instructors","requirements", "length","effort","prices","institutions","subjects","language","url","title","keywords");

public $quitar=array
("description" => "Descripción de curso ",
"contents" => "/(Módulo|Modulo) [0-9]* *(\.|:) /",
"instructors" => false,
"requirements" =>false,
"length" => false,
"effort" => false,
"prices" => false,
"institutions" => false,
"subjects" => false,
"language" => false,
"url" => false,
"title" => false,
"keywords" => false
);

public $quitar_donde=array(
"description" => "beginning",
"contents" => "each",
"instructors" => false,
"requirements" =>false,
"length" => false,
"effort" => false,
"prices" => false,
"institutions" => false,
"subjects" => false,
"language" => false,
"url" => false,
"title" => false,
"keywords" => false
);

public $query=array(
"description" => '//div[@id="p_p_id_coursedescription_WAR_liferaylmsportlet_"]',
"contents" => '//table[@id="idModuleTable"]/tr/td[@class="title"]',
"instructors" => '//div[@class="teacher"]//span[@class="user-name"]',
"requirements" =>false,
"length" => false,
"effort" => false,
"prices" => false,
"institutions" => false,
"subjects" => false,
"language" => false,
"url" => false,
"title" => false,
"keywords" => false
);

private $doc; //$this->doc
//private $test_param=false;

private $doc_text;
public $filename;//with path

function  __construct($nameOfFile)
{
	$this->filename=$nameOfFile;
	$this->doc=new DOMDocument();
	@$this->doc->loadHTMLFile($this->filename);
	@$this->doc_text=html2text( $nameOfFile, false, true );
	echo "\nFile: ".$this->filename."\n";
}

public function get_info_course()
{
	$devolver=array();
	$val=false;
	foreach ($this->params as $param)
	{
		if (in_array($param,$this->no_xpath))
		$val=$this->get_part_noxpath($param);
		else $val=$this->get_part($param,$this->doc);
		if ($val AND $this->quitar_donde[$param]=="beginning") $devolver[$param]=trim(explode($this->quitar[$param],$val)[1]);
		if ($val AND $this->quitar_donde[$param]=="end") $devolver[$param]=trim(explode($this->quitar[$param],$val)[0]);
		else
		{
			if ($val ) $devolver[$param]=$val;
		}
		
	}
	return $devolver;
}

protected function get_part($part,$doc)
{
	$xpath = new DOMXPath($doc);
	//var_dump($doc);
	
	if (!isset($this->query[$part]) OR !$this->query[$part]  ) return false;//there isn't a defined query for this element
	//else {echo "\nQuery";
	//var_dump($this->query[$part]);
	//}
	$items = $xpath->query($this->query[$part]);
	
	//if ($part==$this->test_param) var_dump($items);
	$valor=false;
	if (!$items) return false;//TODO warning
	foreach ($items as $item) 
	{
		if ($this->quitar_donde[$part]=="each")
		{
			
			//$valor[]=trim(explode($this->quitar[$param],$item->nodeValue)[1]);
			$valor[]=trim(preg_replace($this->quitar[$part],"",$item->nodeValue,1));
		}
		else
		{
			$valor[]=trim($item->nodeValue);
		}
	}
	if($valor)
	{
		if (count($valor)==1)//the result has only one element
		{
			$valor=trim($valor[0]);
		}		
	}
		
	//return $description;
	return $valor;
}


protected function get_part_noxpath($part)
{
	
}

public function test($part)
{
		//$this->doc->save("valid.html");
		$xpath = new DOMXPath($this->doc);
		if (!isset($this->query[$part]) OR !$this->query[$part]  ) 
		{echo "\n this->query[part] not defined or false\n";
			return false;}
		else 
		{
			$items = $xpath->query($this->query[$part]);
			var_dump($items);
		}
}
}//end of class
?>
