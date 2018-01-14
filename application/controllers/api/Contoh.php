<?php


class Contoh extends MY_Controller {
	public $key;
	public function __construct(){
		parent::__construct();
		// $this->key=$this->jwt()->key();
	}
	public function index_get(){
		$token=[
			'id'=>'614763241989',
			'username'=>'bebek_bakar',
			'iat'=> (new DateTime())->getTimestamp(),
			'exp'=> ((new DateTime())->getTimestamp())+60*60*5
		];
		$output['id_token'] = $this->jwt()->encode($token);
        $this->set_response($output, REST_Controller::HTTP_OK);
	}

	public function decode_get(){
		$decoded = $this->jwt()->decode("eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjYxNDc2MzI0MTk4OSIsInVzZXJuYW1lIjoiYmViZWtfYmFrYXIiLCJpYXQiOjE1MTU5MzY2NDksImV4cCI6MTUxNTk1NDY0OX0.YQ_FdJwZghaavG1tOUSkxqHtDXwLSsX7cdXQwSeNre8");

		$this->set_response($decoded, REST_Controller::HTTP_OK);
	}
	public function header_get(){
		$this->set_response($this->input->get_request_header('Authorization'), REST_Controller::HTTP_OK);
	}

}
?>