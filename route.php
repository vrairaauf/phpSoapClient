<?php
require "controller/controller.php";
$args=getopt("m:", ["accept:","args:"]);
try{
if($argc>1){
	if(isItServices($args['m'])){
		if($args["accept"] and $args['args']){
		callRemoteWebServices($args['m'], $args['accept'], $args['args']);
		}else{
			throw new Exception("php route.php -m methode --accept typeDeDonne --args parametres ");
		}
	}else{
		throw new Exception($args['m']." : cette methodes nexiste pas ");
	}
}else{
	throw new Exception("nombre darguments insuffisant");
}
}catch(Exception $e){
	die("Error : ".$e->getMessage());
}
?>