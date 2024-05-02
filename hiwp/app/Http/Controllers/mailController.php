<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;


class mailController extends Controller
{
    public function sendEmail()
    {
        // You can customize the recipient email address here
        $recipientEmail = 'uprightness2018@gmail.com';

        // Send email using the SendMail Mailable class
        Mail::to($recipientEmail)->send(new SendMail());

        // Optionally, you can check if the email was sent successfully
        if (Mail::failures()) {
            return response()->json(['message' => 'Failed to send email'], 500);
        }

        return response()->json(['message' => 'Email sent successfully to:' . $recipientEmail], 200);
    }
}
