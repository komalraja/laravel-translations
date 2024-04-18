<?php

namespace Outhebox\LaravelTranslations\Console\Commands;

use Illuminate\Console\Command;

use Outhebox\LaravelTranslations\Http\Controllers\MailController;

class sendEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending the phrase to the translator';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //return 0;
        //using MailController sendTranslationEmail(), send mail to the desirec user
         $mail = new MailController();
         $mail->sendTranslationEmail();

        $this->info('Command executed successfully.');

    }
}
