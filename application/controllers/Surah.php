<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surah extends CI_Controller {

	function __construct() {
        parent::__construct();
    }

	public function index()
	{
        header('Content-type: text/html; charset=utf-8');
        $data = base_url(Q_DEFAULT."surah.json");
        $to_array = json_decode(file_get_contents($data));
        $response = [
            "success" => true,
            "message" => "Succesfully",
            "data"  => $to_array
        ];
        
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
    }
    
    public function find($numb){
        echo get_surah_by_id($numb);
        exit();
    }
}
