<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class roleRequest extends FormRequest
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
        $rules = [
            'permissions' => ['nullable','array'], // Permissions can be optional, but must be an array if present
            'permissions.*' => ['exists:permissions,name'], // Each permission ID must exist in the permissions table
        ];

        if($this->isMethod('POST')){
            $rules['name'][] = Rule::unique('roles','name');
        }elseif($this->isMethod('PUT') || $this->isMethod('PATCH')){
            $RoleId = $this->role ? $this->role->id : null;
            \Log::info("role id is : ",['role id',$RoleId]);
            $rules['name'][] = Rule::unique('roles','name')->ignore($RoleId);
        }
        \Log::info("role id is : ",$rules);
        return $rules;
    }
}
