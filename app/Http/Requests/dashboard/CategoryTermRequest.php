<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class CategoryTermRequest extends FormRequest
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
            case 'DELETE':
                {
                    return array();
                }
            case 'POST':
                {
                    return array(

                        'content_ar'=>'required',
                        'content_en'=>'required',
                        'category_id'=>'required',



                    );
                }
            case 'PUT':
                {

                    return array(
                        'content_ar'=>'required',
                        'content_en'=>'required',
                        'category_id'=>'required',
                    );
                }
            case 'PATCH':

        }
    }
}
