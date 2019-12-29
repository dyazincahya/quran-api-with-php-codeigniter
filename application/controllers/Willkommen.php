<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Willkommen extends CI_Controller {

	public function index()
	{
		$req_surah = base_url(Q_DEFAULT."surah.json");
		$surah_to_array = json_decode(file_get_contents($req_surah));

		$data = [];
		$data['surah'] = $surah_to_array;
		$this->load->view('willkommen_seite', $data);
	}
}
