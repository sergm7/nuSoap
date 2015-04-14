<?php 

header("Content-type: text/xml");
include('lib/nusoap.php');

if(!isset($_REQUEST['ciudad'])){
	$ciudad='Barcelona';

	}else{
		$ciudad=$_REQUEST['ciudad'];	
	}

if(!isset($_REQUEST['pais'])){
	$pais='Spain';

	}else{

	$pais=$_REQUEST['pais'];	
}


$cliente = new nusoap_client('http://www.webservicex.net/globalweather.asmx?WSDL','wsdl');

$error = $cliente->getError();
	if ($error) {
	}


$param = array('CityName'=>$ciudad,'CountryName'=>$pais);

$result = $cliente->call('GetWeather',$param);
$resultado = end($result);
$resultado = mb_convert_encoding($resultado, "UTF-16","UTF-8");

if ($cliente->fault) {

	} else {
		$error = $cliente->getError();
		if ($error) {

		} else {
			 $xml=simplexml_load_string($resultado) or die("No se ha creado");
			 echo $xml->asXML();

	}
}
?>