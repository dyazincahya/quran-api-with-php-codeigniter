<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error404 extends CI_Controller {

	public function index()
	{
        $response = [
            "success" => false,
            "message" => "Invalid Request!"
        ];
        
        echo json_encode($response);
    }
}
