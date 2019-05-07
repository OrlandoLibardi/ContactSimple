<?php

namespace OrlandoLibardi\ContactCms\app\Observers;
use OrlandoLibardi\ContactCms\app\Contact;
use OrlandoLibardi\ContactCms\app\ContactMail;

use Log;

class ContactObserver{

    public function creating($contact)
    {
        $contact->status = ($contact->status=="") ? 0 : $contact->status;
        $contact->created_at = \Carbon\Carbon::now();
    }

    public function created($contact)
    {
        Log::info('ContactObserver created ini');
        ContactMail::send($contact);
        Log::info('ContactObserver created end');
    }    
    
}