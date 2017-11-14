<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateProductRequest
 * @package App\Http\Requests
 */
class UpdateProductRequest extends FormRequest
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
            'name'  => 'required|string|max:60|unique:computer_machine.products,name',
            'code'  => 'required|string|max:60|unique:computer_machine.products,code',
            'price' => 'required|numeric|regex:/^[0-9]{0,8}.[0-9]{0,2}$/',
            'category_id' => "required|integer|exists:computer_machine.categories,id"
        ];
    }
}
