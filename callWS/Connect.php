<?php 
namespace callWs;
use \SoapClient;
class Connect{
	private static $instance;
	public static function get_connexion($configFile){
		if(is_null(self::$instance)){
			$parametres=$configFile;
			$url=$parametres['url']?$parametres['url']:null;
			self::$instance=new SoapClient($url, $parametres['options']);
			
		}
		//die(var_dump(self::$instance->__getFunctions()));
		return self::$instance;
	}
}
?>