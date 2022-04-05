<?php 
require dirname(__DIR__)."/callWS/WebSevices.php";
require dirname(__DIR__)."/callWS/Connect.php";
require dirname(__DIR__)."/test/Monitoring.php";
function isItServices($methode){
	$monitoring=new Test\Monitoring(dirname(__DIR__)."/callWS/config/servicesNames.php");
	if($monitoring->isItInMenu($methode)){
		return true;
	}
}


function callRemoteWebServices($methodes,$type ,$args){
	$connexion=callWs\Connect::get_connexion(dirname(__DIR__)."/callWS/config/config.php");
	$webservices=new callWs\WebServices($connexion);
	die(var_dump($webservices->apelleMethode($methodes, $type, $args)));
}
?>