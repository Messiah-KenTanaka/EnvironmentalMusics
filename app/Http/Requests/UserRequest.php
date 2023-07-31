<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'image' => 'file|mimes:jpeg,png,gif,heic|max:20000',
            'introduction' => 'max:500',
            'youtube' => 'max:100',
            'twitter' => 'max:100',
            'background_image' => 'file|mimes:jpeg,png,gif,heic|max:20000',
        ];
    }

    public function attributes()
    {
        return [
            'image' => '画像',
            'introduction' => '自己紹介',
            'youtube' => 'Youtube',
            'twitter' => 'Twitter',
            'background_image' => '背景画像',
        ];
    }

}