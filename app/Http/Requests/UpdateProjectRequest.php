<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
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
            'title' => ['required', Rule::unique('projects')->ignore($this->route('project')),'min:3','max:50'],
            'add_devs' => 'nullable|min:3',
            'description' => 'required|min:20',
            'github' => 'required|url',
            'image' => 'nullable|url',
            'type_id' => 'required|integer|exists:types,id',
            'technologies' => 'required|array|exists:technologies,id',
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
