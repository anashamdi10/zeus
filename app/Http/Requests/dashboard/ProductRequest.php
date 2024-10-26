<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
                        'name_ar'=>'required',
                        'name_en'=>'required',
                        'description_ar'=>'required',
                        'description_en'=>'required',
                        'main_full'=>'required',
                        'featured'=>'required',
                        'product_code'=>'required',
                        'category_id'=>'required',
                        'harvest_sessions'=>'required',
                        'harvest_essions_ar'=>'required',
                        'sub_title'=>'required',
                        'sub_title_ar'=>'required',
                        'category_term'=>'required',


                    );
                }
            case 'PUT':
                {

                    return array(
                        'name_ar' => 'required',
                        'name_en' => 'required',
                        'description_ar' => 'required',
                        'description_en' => 'required',
                        // 'main_full' => 'required',
                        'featured' => 'required',
                        'product_code' => 'required',
                        'category_id' => 'required',
                        'harvest_sessions' => 'required',
                        'harvest_essions_ar' => 'required',
                        'sub_title' => 'required',
                        'sub_title_ar' => 'required',
                        'category_term' => 'required',
                    );
                }
            case 'PATCH':

        }
    }
}
