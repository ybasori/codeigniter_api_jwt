<?php
require_once APPPATH . '/libraries/REST_Controller.php';
require_once APPPATH . '/libraries/JWT.php';
use \Firebase\JWT\JWT;

class Coba extends REST_Controller {
	public function index_get(){
		$token=[
			'id'=>'614763241989',
			'username'=>'bebek_bakar',
			'iat'=> (new DateTime())->getTimestamp(),
			'exp'=> ((new DateTime())->getTimestamp())+60*60*5
		];
		$output['id_token'] = JWT::encode($token, "my Secret key!");
        $this->set_response($output, REST_Controller::HTTP_OK);
	}

	public function decode_get(){
		$decoded = JWT::decode("eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjYxNDc2MzI0MTk4OSIsInVzZXJuYW1lIjoibmFkaWEgY2FudGlrIiwiaWF0IjoxNTE1OTI5NzEwLCJleHAiOjE1MTU5NDc3MTB9.gij74yZe9MxzAcwyf41qZbp1PIp-shZoH0LQkGJpsIU", "my Secret key!", array('HS256'));

		$this->set_response($decoded, REST_Controller::HTTP_OK);
	}
	public function header_get(){
		$this->set_response($this->input->get_request_header('Authorization'), REST_Controller::HTTP_OK);
	}

}
?>