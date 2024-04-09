<?php

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class TopAdvertisement extends Factory
{
    protected $model = TopAdvertisement::class;

    public function definition()
    {
        return [
            'above_search_ad' => $this->faker->imageUrl(),
            'above_search_ad_url' => $this->faker->url,
            'above_search_ad_status' => $this->faker->randomElement(['Show', 'Hide']),
            'above_footer_ad' => $this->faker->imageUrl(),
            'above_footer_ad_url' => $this->faker->url,
            'above_footer_ad_status' => $this->faker->randomElement(['Show', 'Hide']),
        ];
    }
}
