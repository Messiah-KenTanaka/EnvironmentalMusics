<?php

namespace Database\Factories;

use App\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'id' => $this->faker->numberBetween(1, 1000),
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'nickname' => $this->faker->userName,
            'introduction' => $this->faker->realText,
            'password' => $this->faker->password,
            'image' => $this->faker->imageUrl,
            'publish_flag' => 1,
            'youtube' => 'https://example.com/youtube-profile',
            'twitter' => 'https://example.com/twitter-profile',
            'instagram' => 'https://example.com/instagram-profile',
            'tiktok' => 'https://example.com/tiktok-profile',
            'background_image' => $this->faker->imageUrl,
        ];
    }
}
