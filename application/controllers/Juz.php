<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Juz extends CI_Controller {

	function __construct() {
        parent::__construct();
    }

	public function index()
	{
        echo get_juz();
        exit();
    }

    public function viewer($numb=null)
	{
        $data = [];
        $data['url'] = site_url("juz");
        $data['json'] = get_juz();
        $data['json_collapsed'] = "false";
		
		$this->load->view('viewer', $data);
	}
}
