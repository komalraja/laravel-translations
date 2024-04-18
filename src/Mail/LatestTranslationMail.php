<?php
namespace Outhebox\LaravelTranslations\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Message;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class LatestTranslationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $emailData;

    public function __construct($emailData)
    {
        $this->emailData = $emailData;
    }

    public function build()
    {
        
        return $this->from('example@example.com')
                    ->view('translations::latest-translation')
                    ->subject('To translate the phrase')
                    ->to(config('translations.translator_mailID'));
                 
    } 
}
