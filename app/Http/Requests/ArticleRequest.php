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
            'image' => 'file|mimes:jpeg,png,gif,heic|max:20000',
        ];
    }

    public function attributes()
    {
        return [
            // 'title' => 'タイトル',
            'body' => '内容',
            'tags' => 'タグ',
            'image' => '画像',
            'fish_size' => 'サイズ',
            'weight' => '重さ',
            'pref' => '都道府県',
            'bass_field' => 'フィールド',
            'rod' => 'ロッド情報',
            'reel' => 'リール情報',
            'line' => 'ライン情報',
            'lure' => 'ルアー情報',
            'weather' => '天気情報',
            'temperature' => '気温情報',
            'water_temperature' => '水温情報',
            'fishing_type' => 'おかっぱりorボート',
            'catch_date' => '釣果日',
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