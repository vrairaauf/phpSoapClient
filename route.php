<?php
require "controller/controller.php";
$args=getopt("m:", ["args:"]);
if($argc>1){
	if(isItServices($args['m'])){
		var_dump($args['args']);
		callRemoteWebServices($args['m'], explode("/", $args["args"]));
	}else{
		die("veiller entrer des parametres");
	}
}
?>