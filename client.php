<?php
$wsdl   = 'https://www.w3schools.com/xml/tempconvert.asmx?WSDL';
$client = new SoapClient($wsdl, array('trace'=>1));  // The trace param will show you errors

$input_celsius = 12;
// web service input param
$request_param = array(
    'Celsius' => $input_celsius
);

try {
    $responce_param = $client->CelsiusToFahrenheit($request_param);
    echo $input_celsius . ' Celsius => ' . $responce_param->CelsiusToFahrenheitResult . ' Fahrenheit';
    $raoufreq=$client->FahrenheitToCelsius(array("Fahrenheit"=>10));
    echo "<br>";
    echo "reponse pour raouf ".$raoufreq->FahrenheitToCelsiusResult;
} catch (Exception $e) { 
    echo "<h2>Exception Error</h2>"; 
    echo $e->getMessage(); 
}

?>