<?php

namespace App\Service;

use DiDom\Document;

class ParserService
{
    public function parser($path)
    {
        $document = new Document(base_path($path), true);
        $xml = simplexml_load_string($document);
        $json = json_encode($xml);
        $data = json_decode($json, true)['body']['auto-catalog']['offers']['offer'];

        $result = array();
        foreach ($data as $oneArray) {
            foreach ($oneArray as $key => $value) {
                if(!$value){
                    $oneArray[$key] = '';
                }
            }
            $result[] = $oneArray;
        }
        // echo "<pre>";
        // print_r($result);
        // echo "</pre>";
        // dd('');
        return $result;
    }
}
