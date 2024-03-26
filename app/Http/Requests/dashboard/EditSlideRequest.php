<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class EditSlideRequest extends FormRequest
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
                        'title'=>'required',
                        'title_ar' => 'required',
                        'sub_title'=>'required',
                        'sub_title_ar' => 'required',
                        'link'=>'required',
                        


                    );
                }
            case 'PUT':
                {

                    return array(
                        'title' => 'required',
                        'title_ar' => 'required',
                        'sub_title' => 'required',
                        'sub_title_ar' => 'required',
                        'link' => 'required',
                        
                    );
                }
            case 'PATCH':

        }
    }
}
