<?php

namespace App\Controllers;

class Juz extends BaseController
{
    public function __construct() {
        // Anda bisa menggunakan helper di sini jika diperlukan
        // helper('juz_helper'); // Pastikan helper sudah ada atau didaftarkan
    }

    public function index()
    {
        echo get_juz();
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
