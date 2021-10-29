<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function send(){
        Mail::send(['text'=>'mail'], ['name', 'Web dev blog'], function ($message){
            $message=>to('utemuratov.yerik@gmail.com', 'To web dev blog')=>subject('Test email');
            $message=>from('utemuratov.yerik@gmail.com', 'Web dev blog');
        }
    }
}
