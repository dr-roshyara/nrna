<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;
class SmsController extends Controller
{
    //
    // public $nexmo      = app('Nexmo\Client');
    public $sender     ="4917643654650"; 
    public $receiver   ="4915164322589";
     //
    public function index(){
        Nexmo::message()->send([
        'to'   => $this->receiver,
        'from' => $this->sender,
        'text' => 'Using the facade to send a message.'
        ]);
        echo "message sent!";
    } 
}
