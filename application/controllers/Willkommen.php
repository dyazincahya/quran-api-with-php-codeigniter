<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Willkommen extends CI_Controller {

	public function index()
	{
		$data = [];
		$data['surah'] = get_surah("array")['data'];
		$this->load->view('willkommen_seite', $data);
	}
}
