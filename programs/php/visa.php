<?php
session_start();
$visa=$_POST['visa'];
$r=0;
$c1=substr($visa, 0,1);
$prim=$c1;
$c1=$c1*2;
if($c1>=10)
	$r++;
$c2=substr($visa, 1,1);
if($c2>=10)
	$r++;
$c3=substr($visa, 2,1);
$c3=$c3*2;
if($c3>=10)
	$r++;
$c4=substr($visa, 3,1);
if($c4>=10)
	$r++;
$c5=substr($visa, 4,1);
$c5=$c5*2;
if($c5>=10)
	$r++;
$c6=substr($visa, 5,1);
if($c6>=10)
	$r++;
$c7=substr($visa, 6,1);
$c7=$c7*2;
if($c7>=10)
	$r++;
$c8=substr($visa, 7,1);
if($c8>=10)
	$r++;
$c9=substr($visa, 8,1);
$c9=$c9*2;
if($c9>=10)
	$r++;
$c10=substr($visa, 9,1);
if($c10>=10)
	$r++;
$c11=substr($visa, 10,1);
$c11=$c11*2;
if($c11>=10)
	$r++;
$c12=substr($visa, 11,1);
if($c12>=10)
	$r++;
$c13=substr($visa, 12,1);
$c13=$c13*2;
if($c13>=10)
	$r++;
$c14=substr($visa, 13,1);
if($c14>=10)
	$r++;
$c15=substr($visa, 14,1);
$c15=$c15*2;
$ul=substr($visa, 15,1);
if($c15>=10)
	$r++;
$suma=$c1+$c2+$c3+$c4+$c5+$c6+$c7+$c8+$c9+$c10+$c11+$c12+$c13+$c14+$c15;
$sum2=$suma*-1;
$resu1=$sum2-$r;
$resu2=$resu1%10;
$c16=10+$resu2;
	echo "<!DOCTYPE html>
	<html lang='es'>
	<head>
		<title>CURP</title>
		<meta charset='UTF-8'/>
		<link rel='stylesheet' type='text/css' href='../../styles/stil.css'/>
	</head>
	<body>
		<form>
			<fieldset>";
				if($prim==4 && $ul==$c16)
					echo "Su tarjeta $visa sí es una VISA.";
				else
					echo "Su tarjeta $visa no es una VISA.";
			echo "</fieldset>
		</form>";
		echo "<br/><a href='../../templates/reg.html'>Regresar</a>";
	 echo "</body>
	</html>";
	session_unset();
   session_destroy();
?>