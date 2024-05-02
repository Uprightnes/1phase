<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage; // Import the Storage facade
use App\Mail\SendMail;
use Mpdf\Mpdf;

class MailController extends Controller
{
    public function sendEmail()
    {
        // Ensure the storage directory exists
        $directory = storage_path('app/pdf');
        if (!Storage::exists('pdf')) {
            Storage::makeDirectory('pdf', 0755, true);
        }

        // You can customize the recipient email address here
        $recipientEmail = 'uprightness2018@gmail.com';
 
        $ccEmails = ['justina.roland@phed.com.ng'];

        // Generate PDF content using mPDF
        $htmlContent = $pdfContent = view('emails.sendmail')->render();

        $mpdf = new \Mpdf\Mpdf(); // Correct instantiation of mPDF
        $mpdf->WriteHTML($htmlContent);
        $pdfContent = $mpdf->Output('', 'S'); // Get PDF content as string

        // Save PDF to storage
        $pdfPath = 'pdf/checks_pdf.pdf';
        Storage::put($pdfPath, $pdfContent);

        //Send email using the SendMail Mailable class
        Mail::to($recipientEmail)
            ->cc($ccEmails)
            ->send(new SendMail($pdfPath));

        // Check if email was sent successfully
        if (Mail::failures()) {
            return response()->json(['message' => 'Failed to send email'], 500);
        }

        return response()->json(['message' => 'Email sent successfully'], 200);
    }

}