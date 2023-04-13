<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Requst_seting extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
           'system_name'=> 'required',
           'address' => 'required',
           'phone'  => 'required'
        ];
    }
    public function messages()
    {
         return[
            'system_name.required'=>'اسم الشركه مطلوب ',
            'address.required'=>'العنوا ن مطلوب ',
            'phone.required'=>'رقم الهاتف مطلوب '
         ];
    }
}
