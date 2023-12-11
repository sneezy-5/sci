<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
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
        return [
            'title' => ['required', 'string', Rule::unique('products')->ignore($this->product)],
            'description' => ['required', 'string'],
            'price' => ['required', 'integer'],
        ];
    }


    public function messages()
    {
        return [
            'title.required' => 'Le nom du produit est requis',
            'title.unique' => 'Le produit existe déjà',
            'description.required' => 'La description est requis',
            'price.required' => 'Le prix  est requis',
            'title.unique' => 'Le titre est déjà utiliser',
        ];
    }
}