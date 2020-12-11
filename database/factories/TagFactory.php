<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $arrItem= array('Iphone 5','Iphone 6', 'Iphone 7', 'Iphone 8','Asus Rog','Nitro 5','Apple watch',
        'Tai nghe sony','Sạc dự phòng','chuột máy tính','bàn phím');

        $arrCategory= array(1,1,1,1,2,2,3,4,4,4,4);                
        static $i=0;
        static $k = 0;
        return [
            
            'tag'=>$arrItem[$i++],
            'description'=>'everything you see',
            'category_id'=>$arrCategory[$k++],
            'quatity' =>random_int(10, 20),
            'image'=>$this->faker->imageUrl(800, 600, 'cats'),
            'isLive'=> 1,
            'price'=>rand(10000,100000),

            
        ];
    }
}
