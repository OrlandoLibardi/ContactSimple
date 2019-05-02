<?php 

namespace OrlandoLibardi\ContactCms\app\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use OrlandoLibardi\ContactCms\app\Contact;
use OrlandoLibardi\ContactCms\app\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:list');
        $this->middleware('permission:edit', ['only' => ['status', 'show']]);                
    }

    public function index(){
        $contacts = Contact::orderBy('id', 'DESC')->paginate(30);
        return view('admin.contact.index', compact('contacts'));
    }

    public function show($id){
        $contact = Contact::find($id);
        return view ('admin.contact.view', compact('contact'));
    }

    public function status(ContactRequest $request, $id){
        Contact::find($id)->update($request->all());
        return response()
        ->json(array(
            'message' => __('messages.update_success'),
            'status'  =>  'success'
        ), 201);
    }
}