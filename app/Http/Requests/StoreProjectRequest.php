<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'title' => 'required|unique:projects|min:3|max:50',
            'add_devs' => 'nullable|min:3',
            'description' => 'required|min:20',
            'date' => 'required|date',
            'github' => 'required|url',
            'image' => 'nullable|url',
            'type_id' => 'required|integer|exists:types,id'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'A title is required',
            'description.min' => 'Brevity is the Soul of Wit, but this project needs a description',
        ];
    }
}
