<?php
require_once  __DIR__."/course.class.php";
$langs=array("English" => "en", "Spanish" => "es", "Español" => "es", "es-ES"=>"es");
$path=__DIR__."/courses/";
$path_target=__DIR__."/descriptions/";
//echo $path."\n";
$dir = opendir($path);
//echo $dir;
$limit=0;
$test_param="contents";
while ($item = readdir($dir)){
	
if( $item != "." && $item != ".." && !is_dir($path.$item))
{	
	$miriada=new Course($path.$item);
	var_dump ($miriada->get_info_course());
	//$miriada->test($test_param);
}
else 
{ echo "\nSkip".$path.$item;}
	
	

if ($limit++>5) break;
}

?>
