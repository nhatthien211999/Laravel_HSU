<?php

namespace Database\Factories;

use App\Models\Cart;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CartFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cart::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $i=1;
        return [
            'user_id'=> $i++,
            'body'=>$this->faker->paragraph(random_int(3, 5)),
            'title'=>random_int(0, 1),

        ];
    }
}
