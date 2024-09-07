<?php

namespace App\Controllers;

class Willkommen extends BaseController
{
  public function index()
  {
    $data = [];
    $data['surah'] = get_surah("array")['data'];

    // Render the view
    return view('willkommen_seite', $data);
  }
}
