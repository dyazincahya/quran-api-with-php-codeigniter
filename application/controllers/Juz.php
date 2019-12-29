<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Juz extends CI_Controller {

	function __construct() {
        parent::__construct();
    }

	public function index()
	{
        header('Content-type: text/html; charset=utf-8');
        $data = base_url(Q_DEFAULT."juz.json");
        $to_array = json_decode(file_get_contents($data));
        $response = [
            "success" => true,
            "message" => "Succesfully",
            "data"  => $to_array
        ];
        
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
    }
}
