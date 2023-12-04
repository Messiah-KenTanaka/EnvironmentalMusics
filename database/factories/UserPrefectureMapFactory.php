<?php

namespace Database\Factories;

use App\UserPrefectureMap;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserPrefectureMapFactory extends Factory
{
    protected $model = UserPrefectureMap::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->numberBetween(1, 1000),
            'user_id' => $this->faker->numberBetween(1, 1000),
            'prefecture' => $this->faker->word,
        ];
    }
}
