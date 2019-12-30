<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surah extends CI_Controller {

	function __construct() {
        parent::__construct();
    }

	public function index()
	{
        echo get_surah();
        exit();
    }
    
    public function find($numb){
        echo get_surah_verse($numb);
        exit();
    }

    public function viewer($numb=null)
	{
        $data = [];
        if($numb === null){
            $data['url'] = site_url("surah");
            $data['json'] = get_surah();
            $data['json_collapsed'] = "false";
        } else {
            $data['url'] = site_url("surah/find/".$numb);
            $data['json'] = get_surah_verse($numb);
            $data['json_collapsed'] = "true";
        }
		
		$this->load->view('viewer', $data);
	}
}
