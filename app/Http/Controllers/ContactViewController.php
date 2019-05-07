<?php 

namespace OrlandoLibardi\ContactCms\app\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use OrlandoLibardi\ContactCms\app\Contact;
use OrlandoLibardi\ContactCms\app\Http\Requests\ContactRequest;

use Log;

class ContactViewController extends Controller
{
    public function store(ContactRequest $request)
    {
        Log::info("ContactViewController store");
        
        $contact = Contact::create( $request->all() );       
        return response()
        ->json(array(
            'message' => __('messages.create_success'),
            'status'  =>  'success'
        ), 201);

    }    

}