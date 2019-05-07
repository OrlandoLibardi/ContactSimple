<?php 

namespace OrlandoLibardi\ContactCms\app\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use OrlandoLibardi\ContactCms\app\Http\Requests\ContactResponseRequest;
use OrlandoLibardi\ContactCms\app\ServiceContactResponse as ServiceContactResponse;
use OrlandoLibardi\ContactCms\app\ServiceContactConfig as ServiceContactConfig;
use Log;

class ContactResponseController extends Controller
{
    public function __construct() {
        $this->middleware('permission:list');
        $this->middleware('permission:create', ['only' => ['create', 'update']]);       
    }

    public function index(){
        $config = ServiceContactConfig::getConfig();
        $templates = [ 
            'admin' => ServiceContactResponse::loadTemplate(0), 
            'user' =>  ServiceContactResponse::loadTemplate(1)
        ];
        return view('admin.contact.responses', compact('config', 'templates'));
    }


   

   public function update(ContactResponseRequest $request, $id)
   {
       Log::info($request->cc);
        $config = [];
        $config['title_admin'] = $request->title_admin;
        $config['title_user'] = $request->title_user;
        $config['reply_user_name'] = $request->reply_user_name;
        $config['reply_user_email'] = $request->reply_user_email;
        $config['cc'] = json_decode($request->cc, true);

        ServiceContactConfig::setTag($config);

        ServiceContactResponse::save(0, $request->admin_template);
        ServiceContactResponse::save(1, $request->user_template);

        return response()
        ->json(array(
            'message' => __('messages.update_success'),
            'status'  =>  'success'
        ), 501);
   }

}