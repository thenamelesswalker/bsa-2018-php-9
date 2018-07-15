<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CurrencyRequest extends FormRequest
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
            'title' => 'required|max:255',
            'short_name' => 'required|min:2|max:10',
            'price' => 'required|numeric|min:0',
            'logo_url' => 'required|url',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'The title field is required.',
            'title.max' => 'Title must be less than 255 symbols',
            'short_name.required' => 'The short name field is required.',
            'short_name.min' => 'Short name must be more than 2 symbols',
            'short_name.max' => 'Short name length must be less than 10 symbols',
            'price.required' => 'The price field is required.',
            'price.numeric' => 'The price must be a number.',
            'price.min' => 'The price must be at least 0.',
            'logo_url.required' => 'The logo url field is required.',
            'logo_url.url' => 'The logo url format is invalid.',
        ];
    }
}
