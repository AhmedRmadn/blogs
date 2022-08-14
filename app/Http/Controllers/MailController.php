<?php

namespace App\Http\Controllers;

use App\Mail\welcomeMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail()
    {

        Mail::to('ahmednasser1902@gmail.com')->send(new welcomeMail());
        
        return response()->json([
            'message' => 'Email has been sent.'
        ], 200);
    }
}
