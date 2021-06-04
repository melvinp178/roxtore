<?php

echo '<img src="archivos/1.jpg">';

$rutaImagen="archivos/1.jpg";

$imagenOriginal=imagecreatefromjpeg($rutaImagen);
list($ancho,$alto)=getimagesize($rutaImagen);

$max_ancho=1024;
$max_alto=168;

$x_ratio=$max_ancho/$ancho;
$y_ratio=$max_alto/$alto;

    if(($ancho<=$max_ancho) &&  ($alto<=$max_alto)){
	
	$ancho_final=$ancho;
    $alto_final=$alto;
	
	}else if(($x_ratio*$alto)<$max_alto){
	
	$ancho_final=$max_ancho;
    $alto_final=ceil($x_ratio*$alto);
	}else{
	
	$ancho_final=ceil($y_ratio*$ancho);
    $alto_final=$max_alto;
	}






$tmp=imagecreatetruecolor($ancho_final,$alto_final);
imagecopyresampled($tmp,$imagenOriginal,0,0,0,0,$ancho_final,$alto_final,$ancho,$alto);

$calidad=95;
 imagejpeg($tmp,'2.jpg',$calidad);
echo '<img src="2.jpg">';













/*
//Ejemplo para agragar infromacion a un txt
$file=fopen("2.txt",'a');
fwrite($file,"LINEA 3".PHP_EOL);
fwrite($file,"LINEA 4".PHP_EOL);
fwrite($file,"LINEA 8".PHP_EOL);
fclose($file);*/




/*
//Ejemplo de lectura de un txt
$file=fopen("2.txt",'r');
while(!feof($file)){
    echo fgets($file).'<br>';
}
fclose($file);
*/





/*
//Ejemplo de escritura en un txt
$file=fopen("2.txt",'w');
fwrite($file,"HOLA AMIGOS ESTO ES UNA PRUEBA".PHP_EOL);
fwrite($file,"ESTA ES OTRA LINEA".PHP_EOL);
fclose($file);*/




/*
SIRVE PARA LEER ARCHIVOS CSV

if(($gestor = fopen('1.csv','r')) !== false){

    while(($datos= fgetcsv($gestor,1000,';')) !== false){
	
	   for($c=0;$c<count ($datos);$c++){
	       echo $datos[$c].'  $nbsp;$nbsp;$nbsp;$nbsp;$nbsp;$nbsp;$nbsp;$nbsp;$nbsp;$nbsp;$nbsp;  ';
	   }
	   echo'<br>';
	}
	
	fclose($geston);
}*/

?>