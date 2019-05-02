<?php

namespace OrlandoLibardi\ContactCms\app\Obervers;


class ContactObserver{

    public function creating($contact)
    {
        $contact->status = ($contact->status=="") ? 0 : $contact->status;
        
        $contact->created_at = \Carbon\Carbon::now();
    }
    
    public function updating($contact)
    {
        $contact->status = ($contact->status=="") ? 0 : $contact->status;
        $contact->updated_at = \Carbon\Carbon::now();
    }

    public function deleting($contact)
    {
        
    }
}