<?php
require "controller/controller.php";
if($argc>1){
	if(isItServices($argv[1])){
		callRemoteWebServices($argv[1], $argv[2]);
	}
}else{
	die("veiller entrer des parametres");
}
?>