<!DOCTYPE html>
<hmtl>

	<head>
		<title>Calculadora</title>
	</head>


	<body>

		<form name="formulario" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <select name="operacion">
                    <option value="Suma">Suma</option>
                    <option value="Resta">Resta</option>
                    <option value="Multiplicacion">Multiplicacion</option>
                    <option value="Division">Division</option>
                    <input type="number" name="num1" value="0" placeholder="num1">
                    <input type="number" name="num2" value="0" placeholder="num1">

                   
         	
                    <input type="submit" value="Operar">
     </form>

	</body>

</hmtl>


<?php
 
require_once ('lib/nusoap.php');

$num1 = $_POST['num1'];
$num2 = $_POST['num2'];

$operacion = $_POST['operacion'];



$wsdl="http://2daw06.cesnuria.com/curs_php/serveis1/calc_server.php?wsdl";
$client = new nusoap_client($wsdl,'wsdl');
$params = array('a' => $num1, 'b'=>$num2);


$result= $client->call($operacion, $params);

echo '<h2>Resultat</h2><pre>';
$err = $client->getError();
if ($err) {
	// Display the error
	echo '<p><b>Error: '.$err.'</b></p>';
} else {
	// Display the result
	print_r($result);

}

?>





