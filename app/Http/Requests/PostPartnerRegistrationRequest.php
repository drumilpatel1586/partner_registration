<?php

namespace App\Http\Requests;

use App\Rules\ActiveUrl;

use Illuminate\Foundation\Http\FormRequest;

class PostPartnerRegistrationRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {

        return [
            'company_name' => 'required|max:30|regex:/^[a-zA-Z\s.]+$/',
            'address' => 'required|max:255|regex:/^[a-zA-Z0-9\s,.\'\/\-]+$/',
            'select_country' => 'required',
            'select_state' => 'required',
            'select_city' => 'required',
            'zip' => 'required|numeric|digits:6',
            'website' => ['required', 'url', 'max:255', new ActiveUrl],
            'landline' => 'required|numeric',
            'first_name' => 'required|max:30|regex:/^[a-zA-Z]+$/',
            'last_name' => 'required|max:30|regex:/^[a-zA-Z]+$/',
            'job_title' => 'required|max:20|regex:/^[a-zA-Z\s]+$/',
            'mobile' => 'required|numeric|digits:10',
            'personal_landline' => 'required|numeric',
            'mail' => 'required|email|max:255',
            'captcha' => 'required'
        ];
    }
}
