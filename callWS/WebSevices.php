<?php 
namespace callWs;
use \SoapClient;
use \stdClass;
use \Exception;
class WebServices{
	private $possibleStructure=["variable", "liste", "dictionnaire", "object"];
	private $connexion;
	public function __construct(SoapClient $connexion){
		$this->connexion=$connexion;
	}
	private function array2object(array $array){
    $object = new stdClass();
    foreach ($array as $key => $val){
        if (is_array($val)){
            $object->$key = array2Object($val);
        } else {
            $object->$key = $val;
        }
    }
    return $object;
	}
	private function build_object($chaine){
		$array=$this->build_dictionnaire($chaine);
		return $this->array2Object($array);
	}
	private function build_dictionnaire($chaine){
		try{
			$dict=[];
			$key_value=explode('/', $chaine);
			foreach($key_value as $entity){
				$array=explode("=", $entity);
				if(count($array)<2){
					return throw new Exception("Dictionnary mussing entity");
				}
				$dict +=[$array[0]=>$array[1]];
				
			}
			return $dict;
		}catch(Exception $e){
			return $e->getMessage();
		}
		
	}
	private function transform_structure($type, $chaine){
		try{
			if($type=="variable"){
				return $chaine;
			}elseif($type=="liste"){
				return explode("/", $chaine);
			}elseif($type=="dictionnaire"){
				return $this->build_dictionnaire($chaine);
			}elseif($type=="object"){
				return $this->build_object($chaine);
			}
		}catch(Exception $e){
			die("ERROR : ".$e->getMessage());
		}
	}
	public function apelleMethode($methode, $structureType, $parametres){
		try{
			if(!in_array($structureType, $this->possibleStructure)){
				throw new Exception("--accept must be [variable, liste, dictionnaire, object]");
			}
			if(!$this->transform_structure($structureType, $parametres)){
				throw new Exception("--args invalide");
			}
			$parametres=$this->transform_structure($structureType, $parametres);
			die(var_dump($parametres));
			$server_response=$this->connexion->$methode($parametres);
			return $server_response;
		}catch(Exception $e){
			die("ERROR : ".$e->getMessage());
		}

		
	}
	public function getAllMethodes(){
		return this->connexion->__getFunctions();
	}
	
}
?>