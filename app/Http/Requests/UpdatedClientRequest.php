<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatedClientRequest extends FormRequest
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
            "contact_name"=>["string","required","max:255"],
            "contact_email"=>["required","unique:clients,contact_email,{$this->client->id}"],
            "contact_phone_number"=>["integer","required"],
            "company_name"=>["string","required","max:255"],
            "company_address"=>["string","required","max:255"],
            "company_city"=>["string","required","max:255"],
            "company_zip"=>["string","required"],
            "company_vat"=>["string","required"],
        ];
    }
}
