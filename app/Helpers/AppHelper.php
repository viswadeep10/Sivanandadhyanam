<?php

namespace App\Helpers;

class AppHelper
{

    public static function calculateAmount($total,$part)
    {
            $percentage = ($total*$part)/100;
            return round($percentage, 2);
    }

    public static function sendMessage($mobile,$download_url)
    {
        try {    
            
$api_key = "2d08776e-72a6-11f0-98fc-02c8a5e042bd";

$curl = curl_init();

$payload = json_encode(array(
    "messaging_product" => "whatsapp",
    "recipient_type" => "individual",
    "to" => $mobile,
    "type" => "template",
    "template" => [
        "language" => [
            "code" => "en"
        ],
        "name" => "download_assignment",
        "components" => [
            [
                "type" => "BODY",
                "parameters" => [
                    [
                        "type" => "text",
                        "text" =>  $download_url
                    ]
                ]
            ]
        ]
    ]
));

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://partnersv1.pinbot.ai/v3/722273250972406/messages',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => $payload,
    CURLOPT_HTTPHEADER => array(
        'apikey: ' . $api_key,
        'Content-Type: application/json',
        'Authorization: Bearer ' . $api_key,
    ),
));

$response = curl_exec($curl);
        $res = json_decode($response,true);
        print_r($res);
        die;
        if($response && $res['messages'][0]['message_status']=='accepted')
        {
            return true;
        }
        else
        {
            return false;
        }
     } catch (\Throwable $th) {
           
           return $th->getMessage();
        }
    }
}
