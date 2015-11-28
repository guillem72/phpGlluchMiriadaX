<?php
require_once  __DIR__."/course.class.php";

$path=__DIR__."/courses/";
$path_target=__DIR__."/json0/";
//echo $path."\n";
$dir = opendir($path);
//echo $dir;
$limit=0;
$test_param="contents";

Course::resetLog();
while ($item = readdir($dir)){
	
if( $item != "." && $item != ".." && !is_dir($path.$item))
{	
	$miriada=new Course($path.$item);
	$filename2=trim(basename($item," .html"));
	$miriada->save($path_target.$filename2.".json");
	//($miriada->get_info_course());
	//$miriada->test($test_param);
}
else 
{ echo "\nSkip".$path.$item;}
	
	

//if ($limit++>5) break;
}

?>
