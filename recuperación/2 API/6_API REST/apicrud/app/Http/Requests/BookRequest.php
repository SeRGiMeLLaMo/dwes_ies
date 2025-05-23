<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
          
                'title' => 'required|string|max:255|min:1',
                'author' => 'required|string|max:255|min:3',
                'genre' => 'required|string|max:255|min:2',
                'pages' => 'required|integer|min:10'

        ];
    }
}
