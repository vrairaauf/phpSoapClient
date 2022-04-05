<?php 
namespace callWs;
use \SoapClient;
class Connect{
	private static $parametres=[];
	private static $instance;
	public static function get_connexion($configFile){
		if(is_null(self::$instance)){
			self::$parametres=require($configFile);
			$url=self::$parametres['url']?self::$parametres['url']:null;
			self::$instance = new SoapClient($url, self::$parametres['options']);
		}
		//die(var_dump(self::$instance->__getFunctions()));
		return self::$instance;
	}
	
}
?>