<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'fname' => ['required', 'regex:/^[a-zA-Z\-.\s]+$/'],
            #'lname' => ['required', 'regex:/^[a-zA-Z\-]+$/'],
            'email' => [ 'email'],
            'add' => ['required', 'regex: /^[a-zA-Z0-9\-.\s]+$/'],
            'city' => ['required', 'regex:/^[a-zA-Z\-]+$/'],
            'phone' => 'required|max:10|regex:/^^[0-9+\(\)#\.\s\/ext-]+$/',
        ]; 
    }

    public function messages()
{
    return [
        'fname.required' => 'Le prénom est requis',
        'fname.regex' => 'Le prénom est incorrect',
        'lname.required' => 'Le nom est requis',
        'lname.regex' => 'Le nom est incorrect',
        //'email.required' => 'Email est requis',
        'add.required' => 'L\'adresse est requis',
        'city.required' => 'La ville est requis',
        'city.regex' => 'Le format de la ville est incorrect',
        'phone.required' => 'Le numéro de téléphone est requis',
        'phone.integer' => 'Le numéro de téléphone doit contenir que des chiffres',
        'phone.max' => 'Le numéro de téléphone ne peut pas dépasser 10 caractère',
        'phone.regex' => 'Le format du numéro est incorrect',
    ];
}
}