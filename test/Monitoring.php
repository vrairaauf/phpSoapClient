<?php 
/*
cette classe pour prendre en charge les fonction necessaire du service web pour lappeler

*/
namespace Test;
class Monitoring{
	private $allPossibleMethods;
	public function __construct($arrayPath){
		$this->allPossibleMethods=$arrayPath;
	}
	public function isItInMenu($function){
		if(in_array($function, $this->allPossibleMethods)){
			return true;
		}
		die("Cette methodes introvable");
	}
	public function getAllPossibleFunction(){
		foreach($this->allPossibleMethods as $possibleFunction){
			echo "$possibleFunction";
		}
	}
}
?>