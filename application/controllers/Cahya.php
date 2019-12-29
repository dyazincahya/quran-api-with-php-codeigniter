<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cahya extends CI_Controller {

	function __construct() {
        parent::__construct();
    }

	public function index()
	{        
        echo get_surah_by_id(1);
        exit();
        /* echo base_url(Q_KEMENAG."kemenag/surah/1.json");
        echo "<pre>";
        print_r($data);
        exit(); */
        $response = [
            "success" => true,
            "message" => "Succesfully",
            "data"  => $data
        ];
        
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
    }
}
