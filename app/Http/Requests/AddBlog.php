<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddBlog extends FormRequest
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
            //
            "name" => "required|string|max:255",
            "description" => "string|max:500|nullable",
            "image" =>"required|mimes:png,jpg,jpeg|max:2048",
            "category_id" =>"required   |numeric|exists:categories,id"
        ];
    }
    public function attributes()
    {
        return [
            "category_id" => "category_field"
        ];
        
    }
}
