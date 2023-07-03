<?php

namespace App\Http\Requests;

use http\Client\Request;
use Illuminate\Foundation\Http\FormRequest;

class NewRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
        ];
    }

//    public function rules2()
//    {
//        return [
//            'name' => 'required|string',
//            'password' => 'required|min:6',
//        ];
//    }

}
