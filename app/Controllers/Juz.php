<?php

namespace App\Controllers;

class Juz extends BaseController
{
	public function __construct()
	{
		// Anda bisa menggunakan helper di sini jika diperlukan
		// helper('juz_helper'); // Pastikan helper sudah ada atau didaftarkan
	}

	public function index()
	{
		// Cek apakah file .env tersedia
		$envPath = ROOTPATH . '.env';
		if (!file_exists($envPath)) {
			echo json_encode([
				'success' => false,
				'endpoint' => site_url('juz'),
				'message' => 'API is in demo mode. Please use your own hosting to try this API. Add API_DEMO=true in your .env file to enable this feature.'
			]);
		} else {
			// Cek nilai API_DEMO dari file .env
			$apiDemo = getenv('API_DEMO');
			if ($apiDemo === 'true') {
				echo json_encode([
					'status' => 'Demo Mode',
					'endpoint' => site_url('juz'),
					'message' => 'API is in demo mode. Please use your own hosting to try this API. Add API_DEMO=true in your .env file to enable this feature.'
				]);
			} else {
				echo get_juz();
			}
		}
		exit();
	}

	public function viewer()
	{
		$data = [];
		// Menggunakan route to() dari helper URL atau tetap menggunakan site_url
		$data['url'] = site_url("juz");
		$data['json'] = get_juz();
		$data['json_collapsed'] = "false";

		// Return view
		return view('viewer', $data);
	}
}
