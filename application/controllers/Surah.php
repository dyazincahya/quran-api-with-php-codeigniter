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
}
