<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
        return [
            'name'=>'required',
            'price'=>'required',
            'slcate'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Vui lòng nhập tên sách',
            'price.required'=>'Vui lòng nhập gía tiền',
            'slcate.required'=>'Vui lòng chọn thể loại'
        ];
    }
}
