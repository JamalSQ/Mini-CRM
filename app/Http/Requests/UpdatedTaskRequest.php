<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatedTaskRequest extends FormRequest
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
            'title'=>['required','string','max:255'],
            'description'=>['required','string','max:255'],
            'client_id'=>['required','exists:clients,id'],
            'user_id'=>['required','exists:users,id'],
            'project_id'=>['required','exists:projects,id'],
            'deadline'=>['required','date'],
            'status'=>['required']
        ];
    }
}
