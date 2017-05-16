<?php
session_start();
//Practica 1 (Módulo)
	function mod ($a,$b)
	{
		$r=$a%$b;
		if ($a && $b<0)
			$b=abs($b);
		if($r<0)
			$r=$r+$b;
		return $r;
	}

//Práctica 2 (n)
	function codifica($x)
	{
		$d=array('a'=>'1','b'=>'2','c'=>'3','d'=>'4','e'=>'5','f'=>'6','g'=>'7','i'=>'8','j'=>'9','k'=>'10','l'=>'11','m'=>'12',
		'n'=>'13','ñ'=>'14','o'=>'15','p'=>'16','q'=>'17','r'=>'18','s'=>'19','t'=>'20','u'=>'21','v'=>'22','w'=>'23','x'=>'24','y'=>'25','z'=>'26', 'h'=>'27');
		$r=str_split($x);
		foreach($d as $y => $p)
		{
			$r=str_replace($y,$p,$r);
			
		}
		$r=implode('',$r);
		echo $r;
	}
	function decodifica($x)
	{
		$d=array('1'=>'a','2'=>'b','3'=>'c','4'=>'d','5'=>'e','6'=>'f','7'=>'g','8'=>'i','9'=>'j','10'=>'k','11'=>'l','12'=>'m',
		'13'=>'n','14'=>'ñ','15'=>'o','16'=>'p','17'=>'q','18'=>'r','19'=>'s','20'=>'t','21'=>'u','22'=>'v','23'=>'w','24'=>'x','25'=>'y','26'=>'z', '27'=>'h');
		$r=str_split($x);
		foreach($d as $y => $p)
		{
			$r=str_replace($y,$p,$r);
			
		}
		$r=implode('',$r);
		echo $r;
		
	}

//Practica 3
	function playfair($str, $n)
	{
		$arre=array();
		$arref = array();
		$fin=array();
		$x=0;
		$str=str_split($str,$n);
		foreach($str as $pal)
		{
			$arre[]=$pal;
			$arre2=str_split($arre["$x"]);
			$arref[]=$arre2;
			$x++;
		}
		for($x=0;$x<$n;$x++)
			foreach ($arref as $play => $let) 
			{
				$fin[]=$let[$x];
				$pro=implode('', $fin);
			}
	    echo $pro."<br/>";
	}
	function playfairinv($str, $n)
	{
		$arre=array();
		$arref = array();
		$fin=array();
		$x=0;
		$str=str_split($str,$n);
		foreach($str as $pal)
		{
			$arre[]=$pal;
			$arre2=str_split($arre["$x"]);
			$arref[]=$arre2;
			$x++;
		}
		for($x=$n;$x>=0;$x--)
			foreach ($arref as $play => $let) 
			{
				$fin[]=$let[$x];
				$pro=implode('', $fin);
			}
	    echo $pro."<br/>";
	}

//Practica 4
	function cuenta($cta)
	{
		$x;
		$cta=str_split($cta);
		for($x=8;$x>=0;$x--)
			echo $cta[$x].";V";
	}

//Práctica 6
  function strToBin($input)
  {
    if (!is_string($input))
      return false;
    $value = unpack('H*', $input);
    return base_convert($value[1], 16, 2);
  }
    function Bin($input)
  {
    if (!is_string($input))
      return false;
    $value = unpack('H*', $input);
    return bindec(base_convert($value[1], 16, 2));
  }

//Practica 7
  function ell($x)
  {
	  $x=str_split($x);
	  $y=count($x);
	  unset($x[$y-1]);
	  $x=implode($x);
	  echo $x;
  }
  //Aqui inician las funciones principales
  if ($_POST['accion']=='1')
   {
	   //1
   	echo "Practica de modulo (a=-13, b=64)<br/>";
		$a=-13;
		$b=64;
		$c=mod($a,$b);
		echo $c;
	}
 else if ($_POST['accion']=='2')
   {
	   //2
   	echo "Practica de codificacion <br/>";
	  	$t='Hola';
		$t=strtolower($t);
		codifica($t);
		echo "<br/>";
		decodifica($t);	
	}
  else if ($_POST['accion']=='3')
  	{
	  //3
  	echo "Practica de playfair (Arriba a la izquierda y de arriba a la derecha)<br/>";
	  	$n=7;
		$pal='hola mundo, como esta';
		playfair($pal, $n);
		echo "<br/>";
		playfairinv($pal, $n);
	}
   else if ($_POST['accion']=='4')
    {
	   //4
    	echo "Cifrado del numero de cuenta <br/>";
	   $cuent="316205539";
	  cuenta($cuent);
	}
  else if ($_POST['accion']=='6')
  {
	  //6
  	echo "Cifrado simetrico<br/>";
	  $y=0;
	  $x=Bin('h');
	  echo $x."<br/>";
	  $y^=$x & (123455);
	  echo $y."<br/>";
  }
  else if ($_POST['accion']=='7')
  {
	  //7
  	echo "HASH <br/>";
	  ell("Hola mundo");
   }
   echo "<a href='../../templates/reg.html'>Regresar</a>";
   session_unset();
   session_destroy();
?>