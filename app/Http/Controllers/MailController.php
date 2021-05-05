<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class MailController extends Controller
{
    public function sendmail () {
        Mail::send(['text'=> 'emails.mail'], ['name', 'web test'], function($message){
            $message->to('dolgushinzh@gmail.com', 'to web test')->subject('test email');
            $message->from('dolgushinzh@gmail.com', 'web test');
        });
    }

}
