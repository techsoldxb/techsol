<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendSMSController extends Controller
{
    public function sendSMS()
    {
        $basic  = new \Nexmo\Client\Credentials\Basic('a03cfea8', 'xOUfJ5G8rbPhbOjU');
        $client = new \Nexmo\Client($basic);

        $message = $client->message()->send([
            'to' => '96894852333',
            'from' => 'Nexmo',
            'text' => 'A text message sent using the Nexmo SMS API'
        ]);

        dd('message send successfully');
    }
}