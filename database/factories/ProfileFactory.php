<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $id=0;
        $id+=1;
        return [
            'full_name'=>$this->faker->name,
             'address'=>$this->faker->address,
             'birthday'=>$this->faker->date(),
             'avatar'=>$this->faker->imageUrl(800, 600, 'cats'),
             'user_id'=>$id,

        ];
    }
}
