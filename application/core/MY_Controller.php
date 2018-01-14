<?php
require_once APPPATH . '/libraries/REST_Controller.php';
require_once APPPATH . '/libraries/jwt/JWT.php';
use \Firebase\JWT\JWT;
/**
* 
*/
class MY_Controller extends REST_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function jwt(){
        return new JWT_Optional;
        // return new JWT;
    }

}

class JWT_Optional{

	public $key='my secret';

	public function encode($value){

		return JWT::encode($value, $this->key);
	}
	public function decode($value){
		return JWT::decode($value, $this->key, array('HS256'));
	}

}

?>