<?php

namespace App\Controllers;

class Surah extends BaseController
{
  public function __construct()
  {
    // Menggunakan helper yang diperlukan
    // helper('surah_helper'); // Pastikan helper sudah ada atau didaftarkan
  }

  public function index()
  {
    // Cek apakah file .env tersedia
    $envPath = ROOTPATH . '.env';
    if (!file_exists($envPath)) {
      echo json_encode([
        'success' => false,
        'status' => 'Demo Mode',
        'endpoint' => site_url('surah'),
        'message' => 'API is in demo mode. Please use your own hosting to try this API. Add API_DEMO=true in your .env file to enable this feature.'
      ]);
    } else {
      // Cek nilai API_DEMO dari file .env
      $apiDemo = getenv('API_DEMO');
      if ($apiDemo === 'true') {
        echo json_encode([
          'success' => false,
          'status' => 'Demo Mode',
          'endpoint' => site_url('surah'),
          'message' => 'API is in demo mode. Please use your own hosting to try this API. Add API_DEMO=true in your .env file to enable this feature.'
        ]);
      } else {
        // Memanggil fungsi get_surah dari helper
        echo get_surah();
      }
    }
    exit();
  }

  public function find($numb)
  {
    if (isset($numb)) {
      if (empty($numb)) {
        return redirect()->to('/error404');
      } else {

        // Cek apakah file .env tersedia
        $envPath = ROOTPATH . '.env';
        if (!file_exists($envPath)) {
          echo json_encode([
            'success' => false,
            'status' => 'Demo Mode',
            'endpoint' => site_url('surah/find/' . $numb),
            'message' => 'API is in demo mode. Please use your own hosting to try this API. Add API_DEMO=true in your .env file to enable this feature.'
          ]);
        } else {
          // Cek nilai API_DEMO dari file .env
          $apiDemo = getenv('API_DEMO');
          if ($apiDemo === 'true') {
            echo json_encode([
              'success' => false,
              'status' => 'Demo Mode',
              'endpoint' => site_url('surah/find/' . $numb),
              'message' => 'API is in demo mode. Please use your own hosting to try this API. Add API_DEMO=true in your .env file to enable this feature.'
            ]);
          } else {
            // Memanggil fungsi get_surah_verse dari helper dengan parameter $numb
            echo get_surah_verse($numb);
          }
        }
        exit();
      }
    } else {
      return redirect()->to('/error404');
    }
  }

  public function viewer($numb = null)
  {
    if (isset($numb)) {
      if (empty($numb)) {
        return redirect()->to('/error404');
      } else {
        $data = [];

        // Jika $numb kosong, kembalikan semua surah
        if ($numb === null) {
          $data['url'] = site_url("surah");
          $data['json'] = get_surah();
          $data['json_collapsed'] = "false";
        } else {
          // Jika $numb ada, kembalikan surah tertentu
          $data['url'] = site_url("surah/find/" . $numb);
          $data['json'] = get_surah_verse($numb);
          $data['json_collapsed'] = "true";
        }

        // Mengembalikan view
        return view('viewer', $data);
      }
    } else {
      return redirect()->to('/error404');
    }
  }
}
