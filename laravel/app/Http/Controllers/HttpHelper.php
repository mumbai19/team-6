<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class HttpHelper
{
    public static function httpCall($endpoint)
    {

        $client = new Client([
            'headers' => [
                'content-type' => 'application/x-www-form-urlencoded',

            ],
        ]);

        $response = $client->request('GET', 'http://172.20.44.71:8888/api/' . $endpoint);

        $content = $response->getBody();
        // return $content;
        return json_decode($content, true);

    }

    public static function httpCallPost($endpoint, $form_params)
    {

        $client = new Client([
            'headers' => [
                'content-type' => 'application/x-www-form-urlencoded',

            ],
        ]);

        // return $form_params;

        // $data = json_decode($form_params);

        $response = $client->request('POST', 'http://172.20.44.71:8888/api/' . $endpoint, [
            'form_params' => $form_params,
        ]);

        $content = $response->getBody();
        // return $content;
        return json_decode($content, true);

    }


    public static function httpCallPostX($endpoint, $form_params)
    {

        $client = new Client([
            'headers' => [
                'content-type' => 'application/x-www-form-urlencoded',

            ]
        ]);

        // return $form_params;

        // $data = json_decode($form_params);

        $response = $client->request('POST', 'http://localhost:8000/api/'.$endpoint, [
            'form_params' => $form_params
        ]);

        $content = $response->getBody();
        // return $content;
        return json_decode($content, true);

    }




    public static function httpCallNode($endpoint)
    {

        $client = new Client([
            'headers' => [
                'content-type' => 'application/x-www-form-urlencoded',

            ],
        ]);

        $response = $client->request('GET', 'http://172.20.44.71:8888/api/' . $endpoint);


        $response = $client->request('GET', 'http://localhost:8334/api/'.$endpoint);

        $content = $response->getBody();
        // return $content;
        return json_decode($content, true);

    }

    public static function httpCallPostNode($endpoint, $form_params)
    {

        $client = new Client([
            'headers' => [
                'content-type' => 'application/x-www-form-urlencoded',

            ],
        ]);

        // return $form_params;

        $response = $client->request('POST', 'http://172.20.44.71:8888/api/' . $endpoint, [
            'form_params' => $form_params,
        ]);

        $content = $response->getBody();
        // return $content;
        return json_decode($content, true);

    }
}