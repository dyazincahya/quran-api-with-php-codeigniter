<?php

use CodeIgniter\HTTP\ResponseInterface;

function clear_base_url(string $url): string
{
    return FCPATH . $url;
}

function get_juz($return_type = "json")
{
    // Set the header using the response service
    $response = service('response');
    $response->setHeader('Content-Type', 'text/html; charset=utf-8');

    // Fetch data
    $data = json_decode(file_get_contents(clear_base_url(Q_DEFAULT . "juz.json")), true);
    $responseData = [
        "success" => true,
        "message" => "Successfully",
        "data"  => $data
    ];

    if ($return_type === "json") {
        return json_encode($responseData, JSON_UNESCAPED_UNICODE);
    } else {
        return $responseData;
    }
}

function get_surah($return_type = "json")
{
    // Set the header using the response service
    $response = service('response');
    $response->setHeader('Content-Type', 'text/html; charset=utf-8');

    // Fetch data
    $data = json_decode(file_get_contents(clear_base_url(Q_DEFAULT . "surah.json")), true);
    $responseData = [
        "success" => true,
        "message" => "Successfully",
        "data"  => $data
    ];

    if ($return_type === "json") {
        return json_encode($responseData, JSON_UNESCAPED_UNICODE);
    } else {
        return $responseData;
    }
}

function get_surah_verse($numb = 1, $return_type = "json")
{
    // Set the header using the response service
    $response = service('response');
    $response->setHeader('Content-Type', 'text/html; charset=utf-8');

    // Default response
    $responseData = [
        "success" => false,
        "message" => "Failed"
    ];

    if (is_numeric($numb)) {
        // Fetch data from files
        $default = json_decode(file_get_contents(clear_base_url(Q_DEFAULT . "surah/surah_" . $numb . ".json")), true);
        $default_translation_ar = json_decode(file_get_contents(clear_base_url(Q_DEFAULT . "translation/ar/ar_translation_" . $numb . ".json")), true);
        $default_translation_en = json_decode(file_get_contents(clear_base_url(Q_DEFAULT . "translation/en/en_translation_" . $numb . ".json")), true);

        $kemenag = json_decode(file_get_contents(clear_base_url(Q_KEMENAG . "surah/" . $numb . ".json")), true)[$numb];

        $data = [];
        $data['index'] = $default['index'];
        $data['name'] = $default['name'];
        $data['name_arabic'] = $kemenag['name'];

        // Verse data
        foreach ($kemenag['text'] as $verse_key => $verse_val) {
            $data['verse']['verse_' . ($verse_key)] = $verse_val;
        }

        $data['count'] = $default['count'];
        $data['number_of_ayah'] = $kemenag['number_of_ayah'];
        $data['juz'] = $default['juz'];

        // Translations: ID
        $data['translations']['id']['name'] = $kemenag['translations']['id']['name'];
        foreach ($kemenag['translations']['id']['text'] as $verse_key => $verse_val) {
            $data['translations']['id']['verse']['verse_' . ($verse_key)] = $verse_val;
        }

        // Translations: AR
        $data['translations']['ar']['name'] = $kemenag['name'];
        $data['translations']['ar']['verse'] = $default_translation_ar['verse'];

        // Translations: EN
        $data['translations']['en']['name'] = $default_translation_en['name'];
        $data['translations']['en']['verse'] = $default_translation_en['verse'];

        // Interpretation: ID
        foreach ($kemenag['tafsir']['id']['kemenag']['text'] as $intp_key_id => $intp_val_id) {
            $data['interpretation']['id']['verse']['verse_' . ($intp_key_id)] = $intp_val_id;

            // Default No Interpretation for AR and EN
            $data['interpretation']['ar']['verse']['verse_' . ($intp_key_id)] = "No Interpretation!";
            $data['interpretation']['en']['verse']['verse_' . ($intp_key_id)] = "No Interpretation!";
        }

        // Success response
        $responseData = [
            "success" => true,
            "message" => "Successfully",
            "data"  => $data
        ];
    }

    if ($return_type === "json") {
        return json_encode($responseData, JSON_UNESCAPED_UNICODE);
    } else {
        return $responseData;
    }
}
