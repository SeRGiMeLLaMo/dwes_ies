<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoteRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'title' => 'required|max:255|min:3',  // https://laravel.com/docs/11.x/validation
            'description' => 'required|max:255|min:3'
        ];
    }
}
    
