<?php
	require_once 'lib/nusoap.php';

	$soap = new soap_server;
	$soap->configureWSDL('AddService', 'http://2daw06.cesnuria.com/curs_php/serveis1');
	$soap->wsdl->schemaTargetNamespace = 'http://2daw06.cesnuria.com/curs_php/serveis1';
	$soap->register('Suma', array('a' => 'xsd:int', 'b' => 'xsd:int'),array('c' => 'xsd:int'), 'http://2daw06.cesnuria.com/curs_php/serveis1');
	$soap->register('Resta', array('a' => 'xsd:int', 'b' => 'xsd:int'),array('c' => 'xsd:int'), 'http://2daw06.cesnuria.com/curs_php/serveis1');
	$soap->register('Multiplicacion', array('a' => 'xsd:int', 'b' => 'xsd:int'),array('c' => 'xsd:int'), 'http://2daw06.cesnuria.com/curs_php/serveis1');
	$soap->register('Division', array('a' => 'xsd:int', 'b' => 'xsd:int'),array('c' => 'xsd:int'), 'http://2daw06.cesnuria.com/curs_php/serveis1');
	$soap->service(isset($HTTP_RAW_POST_DATA) ?$HTTP_RAW_POST_DATA : '');

function Suma($a, $b){
	return $a + $b;
}

function Resta($a, $b){
	return $a - $b;
}

function Multiplicacion($a, $b){
	return $a * $b;
}

function Division($a, $b){
	return $a/$b;
}

?>

