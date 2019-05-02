<?php 

namespace OrlandoLibardi\ContactCms\app\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use OrlandoLibardi\ContactCms\app\Contact;
use OrlandoLibardi\ContactCms\app\Http\Requests\ContactRequest;

class ContactViewController extends Controller
{
    public function store(ContactRequest $request){
        
        $request->ip_address = \Request::getClientIp(true);

        $contact = Contact::create( $request->all() );
        return response()
        ->json(array(
            'message' => __('messages.create_success'),
            'status'  =>  'success'
        ), 201);

    }
    

}