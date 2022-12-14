<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
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
            'search_content' => 'max:20',
        ];
    }

/**
     * エラーメッセージ
     *
     * @return array
     */
    public function messages() {
        return [
            'search_content.max' => '20文字以内でご入力ください。'
        ];
    }
}
