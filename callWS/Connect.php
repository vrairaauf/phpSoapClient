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
	/*
	public function __construct($configFile){
		$this->parametres=require($configFile);
		$url=$this->parametres['url']?$this->parametres['url']:null;
		self::$instance new SoapClient($url, $this->parametres['options']);
		//die(var_dump($soap->__getFunctions()));
	}
	public function get($key)
	{
		if(in_array($key, $this->parametres)){
			return $this->parametres[$key];
		}
		return "cette parametres introuvable";
	}
	*/
}
?>