<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateNewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // You may implement authorization logic here if needed
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titre' => 'required|string',
            'contenu' => 'required|string',
            'categorie' => 'required|integer',
            'date_debut' => 'required|date',
            'date_expiration' => 'required|date',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'titre.required' => 'The title field is required.',
            'contenu.required' => 'The content field is required.',
            'categorie.required' => 'The category field is required.',
            'date_debut.required' => 'The start date field is required.',
            'date_expiration.required' => 'The expiration date field is required.',
        ];
    }

    /**
     * Handle a failed validation attempt.
     */
    protected function failedValidation(Validator $validator)
    {
        // Extract the first error message for each field
        $errors = [];
        foreach ($validator->errors()->toArray() as $field => $errorMessages) {
            $errors[$field] = $errorMessages[0];
        }

        throw new HttpResponseException(response()->json($errors, 422));
    }
}
