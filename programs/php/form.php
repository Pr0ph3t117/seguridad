<?php
session_start();
$_SESSION['usu']=$_POST['usuario'];

	if (isset($_POST['forma']))
	{
	echo "<!DOCTYPE html>
			<html>
			<head>
				<title>Forma</title>
				<meta charset='utf-8'>
				<link rel='stylesheet' type='text/css' href='../../styles/stil.css'/>
			</head>
			<body>
		<form method='POST' action='form.php'>
			<fieldset class='cuadro'>
				<legend>Proyecto Seguridad</legend>
				<label class='Prueba'>Pruebas</label><br/>
				<select name='accion'>
						<option value='curp'>CURP</option>
						<option value='visa'>VISA</option>
						<option value='Pract'>Practicas</option>
				</select>
				<input type='hidden' name='usuario' value='".$_SESSION['usu']."'/>
				<input type='submit' value='Iniciar'/>
			</fieldset>
		</form>";
	}
	if(isset($_POST['accion']))
	{
		if ($_POST['accion']=='curp')
		{
			echo "<!DOCTYPE html>
			<html>
			<head>
				<title>Forma</title>
				<meta charset='utf-8'>
				<link rel='stylesheet' type='text/css' href='../../styles/stil.css'/>
			</head>
			<body>
			<form method='POST' action='curp.php'>
			<fieldset>
				<legend>Datos personales</legend>
				<label>Nombre:</label>
				<input type='text' name='nom' size='40' maxlength='40' placeholder='Apellido Paterno, Apellido Materno y Nombre(s)'/>
				<label>Fecha de nacimiento:</label>
				<input type='date' name='fechnac'/>
				<label>Sexo:</label>
				<label class='diferente'>Hombre</label>
				<input type='radio' name='sexo' class='diferente' value='H'/>
				<label class='diferente' >Mujer</label>
				<input type='radio' name='sexo'  class='diferente' value='M'/><br/>
				<label>Lugar de Nacimiento:</label>
				<select name='lugar'>
								<option value='AS'>Aguascalientes</option>
								<option value='BC'>Baja California</option>
								<option value='BS'>Baja California Sur</option>
								<option value='CC'>Campeche</option>
								<option value='CL'>Coahuila</option>
								<option value='CM'>Colima</option>
								<option value='CS'>Chiapas</option>
								<option value='CH'>Chihuahua</option>
								<option value='DF'>Distrito Federal</option>
								<option value='DG'>Durango</option>
								<option value='GT'>Guanajuato</option>
								<option value='GR'>Guerrero</option>
								<option value='HG'>Hidalgo</option>
								<option value='JC'>Jalisco</option>
								<option value='MC'>Mexico</option>
								<option value='MN'>Michoacan</option>
								<option value='MS'>Morelos</option>
								<option value='NT'>Nayarit</option>
								<option value='NL'>Nuevo Leon</option>
								<option value='OC'>Oaxaca</option>
								<option value='PL'>Puebla</option>
								<option value='QT'>Queretaro</option>
								<option value='QR'>Quintana Roo</option>
								<option value='SP'>San luis Potosí</option>
								<option value='SL'>Sinaloa</option>
								<option value='SR'>Sonora</option>
								<option value='TC'>Tabasco</option>
								<option value='TS'>Tamaulipas</option>
								<option value='TL'>Tlaxcala</option>
								<option value='VZ'>Veracruz</option>
								<option value='YN'>Yucatán</option>
								<option value='ZS'>Zacatecas</option>
				</select><br/>
			<input type='submit' class='diferente' value='Enviar datos'/>
			<input type='reset' class='diferente'value='Borrar datos'/>
		</fieldset>
		</form>";
		}
		else 
			if ($_POST['accion']=='visa')
			{
				echo "<!DOCTYPE html>
			<html>
			<head>
				<title>Forma</title>
				<meta charset='utf-8'>
				<link rel='stylesheet' type='text/css' href='../../styles/stil.css'/>
			</head>
			<body>
			<form method='POST' action='visa.php'>
					<fieldset class='cuadro'>
						<legend>VISA</legend>
						<label>Introduzca su tarjeta VISA a validar</label><br/>
						<input type='text' size='16' maxlength='16' name='visa'/>
						<input type='submit' value='Verificar'/>
					</fieldset>
				</form>";
			}
		else 
			if ($_POST['accion']=='Pract')
			{
			echo "<!DOCTYPE html>
			<html>
			<head>
				<title>Forma</title>
				<meta charset='utf-8'>
				<link rel='stylesheet' type='text/css' href='../../styles/stil.css'/>
			</head>
			<body>
				<form method='POST' action='practicas.php'>
					<fieldset class='cuadro'>
						<legend>Practicas</legend>
						<label class='Prueba'>Pruebas</label><br/>
						<select name='accion'>
								<option value='1'>1</option>
								<option value='2'>2</option>
								<option value='3'>3</option>
								<option value='4'>4</option>
								<option value='6'>6</option>
								<option value='7'>7</option>
						</select>
						<input type='submit' value='Iniciar'/>
					</fieldset>
				</form>";
			}
	}
	echo "<a href='../../templates/reg.html'>Regresar</a>";
echo "</body>
</html>";
session_unset();
   session_destroy();
?>