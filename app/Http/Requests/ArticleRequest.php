<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            // 'title' => 'required|max:50',
            'body' => 'required|max:500',
            'tags' => 'json|regex:/^(?!.*\s).+$/u|regex:/^(?!.*\/).*$/u',
            'weight' => 'nullable|integer|min:0|max:10000',
        ];
    }

    public function attributes()
    {
        return [
            // 'title' => 'タイトル',
            'body' => '本文',
            'tags' => 'タグ',
            'image' => '画像',
            'fish_size' => 'フィッシュサイズ',
            'pref' => '都道府県',
            'bass_field' => 'フィールド'
        ];
    }

    public function passedValidation()
    {
        $this->tags = collect(json_decode($this->tags))
            ->slice(0, 5)
            ->map(function ($requestTag) {
                return $requestTag->text;
            });
    }
}