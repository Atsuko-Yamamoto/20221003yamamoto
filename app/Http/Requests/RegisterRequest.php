<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
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
            'email' => ['min:8'],
        ];
    }
/**
     * エラーメッセージ
     *
     * @return array
     */
    public function messages() {
        return [
            'email.min' => 'メールアドレスは8文字以上でご入力ください。'
        ];
    }
}
