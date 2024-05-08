<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class editWhyShooseRequest extends FormRequest
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
        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                    return array();
                }
            
            case 'PUT': {

                    return array(
                        'title' => 'required',
                        'title_ar' => 'required',
                        'pragraph_en' => 'required',
                        'pragraph_ar' => 'required',
                    );
                }
            case 'PATCH':
        }
    }
}
