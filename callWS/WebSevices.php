<?php 
namespace callWs;
use \SoapClient;
class WebServices{
	private $connexion;
	public function __construct(SoapClient $connexion){
		$this->connexion=$connexion;
	}
	public function apelleMethode($methode, $parametres=[]){
		die(var_dump($parametres));
		try {
    		$responce_param = $this->connexion->$methode($parametres);
    		return $responce_param;
		} catch (Exception $e) { 
    		return "ERROR :". $e->getMessage(); 
		}
	}
	public function getAllMethodes(){
		return this->connexion->__getFunctions();
	}
	
}
?>