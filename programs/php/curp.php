<?php
session_start();
	function letra($n)
	{
		$r=($n=='A' || $n=='E' || $n=='I' || $n=='O' || $n=='U') ? "v" : "c";
		return $r;
	}
	
	function consa ($nom,$vc,$num,$n)
	{
		$c=false;
		while ($c==false) 
		{
			if($vc[$n]=='c')
				$c=true;
			else
				$n++;
		}
		return $nom[$n];
	}
	
	function edad ($año,$mes,$dia)
	{
		$e=date("Y")-$año;
		if ($mes>date("n") || $dia>date("j"))//El dia, el mes y el a;o deben cambiar dependiendo de la fecha
			$e=$e-1;
		else
			$e=$e;
		return $e;
	}

	function a17 ($año)
	{
		$año = ($año<2000) ? '0' : 'A';
		return $año;
	}

	function a18 ($curp,$año)
	{
		$x;
		$y=18;
		$cont=array('A'=> 10,'B'=> 11,'C'=> 12,'D'=> 13,'E'=> 14,'F'=> 15,'G'=> 16,'H'=> 17,'I'=> 18,'J'=> 19,'K'=> 20,'L'=> 21,'M'=> 22,'Ñ'=> 23,'N'=> 24,'O'=> 25,'P'=> 26,'Q'=> 27,'R'=> 28,'S'=> 29,'T'=> 30,'U'=> 31,'V'=> 32,'W'=> 33,'X'=> 34,'Y'=> 35,'Z'=> 36);
		$curp=str_split($curp);
		$curpb=array_keys($cont);
		foreach ($curpb as $ind)
			$curp=str_replace($ind, $cont[$ind], $curp);
		for ($x=0; $x <15 ; $x++) 
		{ 
			$curp[$x]*=$y;
			$y--;
		}
		$z=array_sum($curp);
		$z=$z%10;
		if($año > 1999)
		{
			$z=10-$z;
			$z=abs($z);
			$z=$z%10;
		}
		return $z;
	}

	$c;
	$nom=$_POST['nom'];
	$noma=array('Á' => 'A', 'É' => 'E', 'Í' => 'I', 'Ó' => 'O', 'Ú' => 'U', 'á' => 'a', 'é' => 'e', 'í' => 'i', 'ó' => 'o', 'ú' => 'u');
	$nomb=array_keys($noma);
	$nomc=$nom;
	foreach ($nomb as $ind)
		$nomc=str_replace($ind, $noma[$ind], $nomc);

	$amc=strstr($nomc, ' ');

	$al=trim($amc, ' ');//Apellido materno
	$nal=strlen($al);
	$nbc=strstr($al, ' ');//Primer nombre
	$nnbc=strlen($nbc);

	$nl=trim($nbc, ' ');

	$nnom=strlen($nomc);
	$nomc=strtoupper($nomc);
	$al=strtoupper($al);
	$nbc=strtoupper($nbc);

	$nomc=str_split($nomc);
	$al=str_split($al);
	$nbc=str_split($nbc);

	for($c=0;$c<$nnom;$c++)
		$vc[$c]=letra($nomc[$c]);
	for($c=0;$c<$nal;$c++)
		$vmc[$c]=letra($al[$c]);
	for($c=0;$c<$nnbc;$c++)
		$vnc[$c]=letra($nbc[$c]);

	$ap2=consa($nomc,$vc,$nnom,1);
	$am2=consa($al,$vmc,$nal,1);
	$no2=consa($nbc,$vnc,$nnbc,2);
	$nomc=implode("", $nomc);
	$al=implode("", $al);
	$nbc=implode("", $nbc);

	$fecha=$_POST['fechnac'];
	$a2=substr($fecha, 0,4);//Año de nacimiento
	$fa=substr($fecha, 2,2);
	$mes=substr($fecha, 5,2);
	$dia=substr($fecha, 8,2);
	$ed=edad($a2,$mes,$dia);

	$sex=$_POST['sexo'];
	$lug=$_POST['lugar'];
	
	$ap=substr($nomc,0,2);
	$am=substr($amc, 1,1);
	$nb=substr($nbc, 1,1);
	$fm=substr($fecha, 5,2);
	$fd=substr($fecha, 8,2);

	$curp=$ap.$am.$nb.$fa.$fm.$fd.$lug.$ap2.$am2.$no2;

	$cp1=a17($a2);
	$cp2=a18($curp,$a2);

	echo "<!DOCTYPE html>
	<html lang='es'>
	<head>
		<title>CURP</title>
		<meta charset='UTF-8'/>
		<link rel='stylesheet' type='text/css' href='../../styles/stil.css'/>
	</head>
	<body>
		<form>
			<fieldset>
				Tu CURP es ".$curp.$cp1.$cp2."<br/>
				Edad:".$ed."<br/>
				Nombre:".$nom."";
			"</fieldset>
		</form>";
		echo "<br/><a href='../../templates/reg.html'>Regresar</a>";
	 echo "</body>
	</html>";
	session_unset();
   session_destroy();
?>