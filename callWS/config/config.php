<?php 
/*
	ce fichier contient les configurations necessaires pour implementer un client SOAP
	veiller lire la documentation su le manuel php 
	ces parametres sont sensible sur le fonctionnement du service
*/
$opts = array(
        'http' => array(
            'user_agent' => 'PHPSoapClient'
        )
    );
$context = stream_context_create($opts);
return array(
	'url' => "https://graphical.weather.gov/xml/SOAP_server/ndfdXMLserver.php?wsdl.", 
	'options'=>[
		//'location'=>"",
		//'uri'=>'',
		//'soap_version'=>SOAP_1_2,
		'trace'=>1,
		'stream_context' => $context,
        'cache_wsdl' => WSDL_CACHE_NONE,
        //en cas de basic authentification
		//'login'=>"",
		//'password'=>''
	]

);
?>