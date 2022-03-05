<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\ClientRegistryEmail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send()
    {
        $objClient = new \stdClass();
        $objClient->client_one = 'Demo One Value';
        $objClient->client_two = 'Demo Two Value';
        $objClient->sender = 'SenderUserName';
        $objClient->receiver = 'ReceiverUserName';
  
        Mail::to("philipmatunda@gmail.com")->send(new ClientRegistryEmail($objClient));
    }
}

