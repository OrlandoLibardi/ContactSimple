<?php

namespace rlandoLibardi\ContactCms\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactResponseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        switch($this->method()){
            case 'PATCH':
                $rules = [
                    'content_admin_template'  => 'required',
                    'content_user_template'   => 'required',                    
                    'title_admin'             => 'required',
                    'title_user'              => 'required',
                    'reply_user_name'         => 'required|email',
                    'reply_user_email'        => 'required|string|max:90',
                    'cc.*'                    => 'sometimes',
                    'cc.*.name'               => 'sometimes',
                    'cc.*.email'              => 'sometimes|email'                                        
                ];   
            break;
                 $rules = [];
        }

        return $rules;

    
    }
    
}
