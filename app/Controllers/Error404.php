<?php

namespace App\Controllers;

class Error404 extends BaseController
{
    public function index()
    {
        $response = [
            "success" => false,
            "message" => "Invalid Request!"
        ];

        // Mengirimkan response JSON dengan setJSON
        return $this->response->setJSON($response);
    }
}
