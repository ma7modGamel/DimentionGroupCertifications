<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;

class SendMailController extends Controller
{
    public function send_mail(Request $request)
    {
        $data["email"] = "User Email";
        $data["title"] = "websolutionstuff.com";
        $data["body"] = "body data";
        $file =  public_path('public/attachments/certificate.pdf');
        Mail::send('mail.Test_mail', $data, function($message)use($data, $file) {
            $message->to($data["email"])
                    ->subject($data["title"]);
                $message->attach($file);            
        });
        echo "Mail send successfully !!";
    }
}