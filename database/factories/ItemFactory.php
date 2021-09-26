<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\Size;
use App\Models\Color;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'color_id' => Color::inRandomOrder()->first()->id,
            'size_id' => Size::inRandomOrder()->first()->id,
            'quantity' => random_int(1,30),
            'image_url' => $this->faker->imageUrl(360,360,'animals')
        ];
    }
}
