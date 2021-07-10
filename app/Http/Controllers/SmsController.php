<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;
use App\Models\Message;

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

    public function create(Request $request){
       $voteMessage = $request->validate([
                'from' => ['required', 'max:50'], 
                'to' => ['required', 'max:50'],
                'message' => ['required', 'max:255'],
           
        ]);
       
        // $sender     =$voteMessage['from']; 
        $sender     ="4917657994107";         
        $receiver   =$voteMessage['to'];
        $code       ="12345";
       //    
        Nexmo::message()->send([ 
        'to'   => $receiver,
        'from' => $sender,
        'text' => 'Vote for me: Your Code is:' . $code
        ]);
        $voteMessage['code'] =$code;
        Message::create($voteMessage );
         // //
          // echo "message sent!"; 
         //    Route::get('/sms', [SmsController::class, 'index']); 
        
        // return Redirect::route('/message'); 
     return redirect('/messages/index')->with('from', 'to', 'message');
        // return Redirect::route('Message.Index');

    }
}
