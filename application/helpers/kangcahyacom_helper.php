<?php
    function get_juz($return_type="json"){
        header('Content-type: text/html; charset=utf-8');

        $data = json_decode(file_get_contents(base_url(Q_DEFAULT."juz.json")), true);
        $response = [
            "success" => true,
            "message" => "Succesfully",
            "data"  => $data
        ];

        if($return_type === "json"){
            return json_encode($response, JSON_UNESCAPED_UNICODE);
        } else {
            return $response;
        }
    }

    function get_surah($return_type="json"){
        header('Content-type: text/html; charset=utf-8');

        $data = json_decode(file_get_contents(base_url(Q_DEFAULT."surah.json")), true);
        $response = [
            "success" => true,
            "message" => "Succesfully",
            "data"  => $data
        ];

        if($return_type === "json"){
            return json_encode($response, JSON_UNESCAPED_UNICODE);
        } else {
            return $response;
        }
    }

    function get_surah_verse($numb=1, $return_type="json")
    {
        header('Content-type: text/html; charset=utf-8');

        $response = [
            "success" => false,
            "message" => "Failed"
        ];

        if(is_numeric($numb)) {
            $default = json_decode(file_get_contents(base_url(Q_DEFAULT."surah/surah_". $numb .".json")), true);
            $default_translation_ar = json_decode(file_get_contents(base_url(Q_DEFAULT."translation/ar/ar_translation_". $numb .".json")), true);
            $default_translation_en = json_decode(file_get_contents(base_url(Q_DEFAULT."translation/en/en_translation_". $numb .".json")), true);
            
            $kemenag = json_decode(file_get_contents(base_url(Q_KEMENAG."surah/". $numb .".json")), true)[$numb];
            
            $data = [];

            $data['index'] = $default['index'];
            $data['name'] = $default['name'];
            $data['name_arabic'] = $kemenag['name'];

            // $data['verse'] = $default['verse'];    
            foreach ($kemenag['text'] as $verse_key => $verse_val) {
                $data['verse']['verse_'.($verse_key)] = $verse_val;
            }

            $data['count'] = $default['count'];
            $data['number_of_ayah'] = $kemenag['number_of_ayah'];
            $data['juz'] = $default['juz'];
            
            // TRANSLATIONS : ID
            $data['translations']['id']['name'] = $kemenag['translations']['id']['name'];
            foreach ($kemenag['translations']['id']['text'] as $verse_key => $verse_val) {
                $data['translations']['id']['verse']['verse_'.($verse_key)] = $verse_val;
            }

            // TRANSLATIONS : AR
            $data['translations']['ar']['name'] = $kemenag['name'];
            $data['translations']['ar']['verse'] = $default_translation_ar['verse'];

            // TRANSLATIONS : AR
            $data['translations']['en']['name'] = $default_translation_en['name'];
            $data['translations']['en']['verse'] = $default_translation_en['verse'];

            // INTERPRETATION : ID
            foreach ($kemenag['tafsir']['id']['kemenag']['text'] as $intp_key_id => $intp_val_id) {
                $data['interpretation']['id']['verse']['verse_'.($intp_key_id)] = $intp_val_id;

                $data['interpretation']['ar']['verse']['verse_'.($intp_key_id)] = "No Interpretation!";
                $data['interpretation']['en']['verse']['verse_'.($intp_key_id)] = "No Interpretation!";
            }

            $response = [
                "success" => true,
                "message" => "Succesfully",
                "data"  => $data
            ];
        }

        if($return_type === "json"){
            return json_encode($response, JSON_UNESCAPED_UNICODE);
        } else {
            return $response;
        }
    }
