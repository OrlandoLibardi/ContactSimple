<?php

namespace OrlandoLibardi\ContactCms\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            case 'POST':
                $rules = [
                    'name'      => 'required|string|max:90',
                    'email'     => 'required|email',
                    'subject'   => 'required|string|max:90',
                    'phone'     => 'sometimes',
                    'message'   => 'required|string',                    
                ];   
            break;
            case 'PATCH':
                $rules = [
                    'status' => 'sometimes|min:0|max:1',
                ]; 
            case 'DELETE':
                $rules = [
                    'id.*' => 'required' 
                ];
            break;
            default:
                 $rules = [];
        }

        return $rules;

    
    }
    
}
