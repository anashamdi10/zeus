<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            case 'POST': {
                    return array(
                        'writer_en' => 'required',
                        'writer_ar' => 'required',
                        'date' => 'required',
                        'title_en' => 'required',
                        'title_ar' => 'required',
                        'pragraph_en' => 'required',
                        'pragraph_ar' => 'required',
                        'image' => 'required |mimes:jpeg,bmp,png,gif,jpg,webp|max:5000',

                    );
                }
            case 'PUT': {

                    return array(
                        'writer_en' => 'required',
                        'writer_ar' => 'required',
                        'date' => 'required',
                        'title_en' => 'required',
                        'title_ar' => 'required',
                        'pragraph_en' => 'required',
                        'pragraph_ar' => 'required',
                    );
                }
            case 'PATCH':
        }
    }
}
