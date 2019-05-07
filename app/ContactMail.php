<?php
namespace OrlandoLibardi\ContactCms\app;
use OrlandoLibardi\ContactCms\app\ServiceContactResponse;

use Mail;
use Log;

class ContactMail extends ServiceContactConfig
{

    public static function send($contact)
    {
        Log::info('ContactMail send ini');
        $path           = "emails.";
        $user_template  = str_replace(".blade.php", "", ServiceContactResponse::name(1));
        $admin_template = str_replace(".blade.php", "", ServiceContactResponse::name(0));
        $config         = self::getConfig(); 
        //user        
        Mail::send($path . $user_template, ['contact' => $contact], function($m) use ($contact, $config){
            $m->from($config['reply_user_email'], $config['reply_user_name']);
            $m->replyTo($config['reply_user_email'], $config['reply_user_name']);
            $m->to($contact->email, $contact->name);
            $m->subject($config['title_user']);
       });
        //admin        
        Mail::send($path . $admin_template, ['contact' => $contact], function($m) use ($contact, $config){
            $m->from($config['reply_user_email'], $config['reply_user_name']);
            $m->replyTo($contact->email, $contact->name);
            $m->to($config['reply_user_email'], $config['reply_user_name']);
            if(is_array($config['cc']) && count($config['cc']) > 0 ){
                foreach($config['cc'] as $copia){
                   $m->cc( $copia['email'], $copia['name'] );
                }
            }
            $m->subject($config['title_admin']);
       });

       Log::info('ContactMail send end');

    }
}