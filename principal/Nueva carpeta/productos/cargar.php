<?php
$directorio='archivos/';

$archivos = reArrayFiles($_FILES['archivos']);

    foreach($archivos as $val){
	
	$extencion=end(explode('.',$val['name']));
	$newname=date('YmdHis',time()).mt_rand().'.'.$extencion;
	move_uploaded_file($val['tmp_name'],$directorio.$newname);
	}
	
	

function reArrayFiles($file){
    $fileArray = array();
	$fileCount = count($file['name']);
	$fileKey = array_keys($file);
	
	for($i=0;$i<$fileCount;$i++){
	
	    foreach($fileKey as $val){
		     $fileArray[$i][$val] = $file[$val][$i];
			 
			 }
	
	}
 return $fileArray;
 
 
 }



?>