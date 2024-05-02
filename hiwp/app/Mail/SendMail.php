<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pdfPath; // Public property to hold the PDF path

    /**
     * Create a new message instance.
     *
     * @param string $pdfPath
     * @return void
     */
    public function __construct($pdfPath)
    {
        $this->pdfPath = $pdfPath; // Assign PDF path to the public property
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
{
    return $this->subject('Redeployment Letter') // Email subject
                ->view('emails.sendmail') // Blade view file for email content
                ->attachFromStorage($this->pdfPath, 'checks_pdf.pdf', ['mime' => 'application/pdf']);
}

}
