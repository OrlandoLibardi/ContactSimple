<?php 

namespace OrlandoLibardi\ContactCms\app\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use OrlandoLibardi\ContactCms\app\Http\Requests\ContactResponseRequest;
use OrlandoLibardi\ContactCms\app\ServiceContactResponse as ServiceContactResponse;
use OrlandoLibardi\ContactCms\app\ServiceContactConfig as ServiceContactConfig;

class ContactResponseController extends Controller
{
    public function __construct() {
        $this->middleware('permission:list');
        $this->middleware('permission:create', ['only' => ['create', 'update']]);       
    }

    public function index(){
        //$responses = ContactResponse::orderBy('id', 'DESC');
        return view('admin.contact.responses', compact('responses'));
    }

   public function update(ContactResponseRequest $request, $id)
   {
        //ContactResponse::find($id)->update( $request->all() );

        ServiceContactConfig::setTag($request->all());

        ServiceContactResponse::save(0, $request->content_admin_template);
        ServiceContactResponse::save(1, $request->content_user_template);

        return response()
        ->json(array(
            'message' => __('messages.update_success'),
            'status'  =>  'success'
        ), 201);
   }

}