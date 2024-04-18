<?php

namespace Outhebox\LaravelTranslations\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Outhebox\LaravelTranslations\Models\Language;
use Outhebox\LaravelTranslations\Http\Middleware\Authorize;
use Outhebox\LaravelTranslations\Models\Phrase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Routing\Controller as BaseController;
use Outhebox\LaravelTranslations\Mail\LatestTranslationMail;

class MailController extends BaseController
{
    public function retrieveLatestTranslations()
    {
        // Retrieve the Japanese language
        $japaneseLanguage = Language::where('code', 'ja')->first();
    
    
        // Retrieve the latest English phrase
        $latestJapanesePhrase = $japaneseLanguage->phrases()->oldest('updated_at')->first();
    
        // Retrieve the English translation for the latest Japanese phrase
        $latestEnglishText = $latestJapanesePhrase->source->value;
    
        // Retrieve the latest Japanese text
        $latestJapaneseText = $latestJapanesePhrase->value;
    
        // Return the retrieved translations
        return [
            'latestEnglishText' => $latestEnglishText,
            'latestJapaneseText' => $latestJapaneseText,
            'latestJapanesePhrase' => $latestJapanesePhrase,
        ];
    }
    
    
    public function sendTranslationEmail()
    {
        // Retrieve the translations using  retrieveLatestTranslations
        $translations = $this->retrieveLatestTranslations();
        
        
        $emailData = [
            'latestEnglishText' => $translations['latestEnglishText'],
            'latestJapaneseText' => $translations['latestJapaneseText'],
            //'uiLink' => $uiLink,
            'approveLink' =>  route('translations_ui.phrases.approve', ['id' => $translations['latestJapanesePhrase']->id]),
            'editLink' => route('translations_ui.phrases.show', [
                'translation' => $translations['latestJapanesePhrase']->translation_id,
                'phrase' => $translations['latestJapanesePhrase']->uuid,
            ]),       
        ];
    
         // Send the email using the Mailable class
         Mail::send(new LatestTranslationMail($emailData));
    
        return response()->json(['message' => 'Email sent successfully']);
    }

    public function approvePhrase($id){
        //Get the phrase by phraseID
        $phrase = Phrase::find($id);

        if($phrase){
            if(($phrase->translation_file_id == 1) && ( $phrase->translation_id == 2)){
               $phrase->update(['approved' => 1]);
               return view('translations::approval_success');
            }
        }
        //dd($phrase);
    }

}
