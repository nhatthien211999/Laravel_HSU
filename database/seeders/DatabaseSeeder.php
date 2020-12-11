<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use App\Models\Profile;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Cart;
use App\models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::factory(2)->create();
        User::factory(10)->create();
        Profile::factory(10)->create();
        Category::factory(4)->create();
        Tag::factory(10)->create();
        cart::factory(10)->create();

                  //user_role
        for($i=0;$i<20;$i++)
        { 
        DB::table('cart_tag')->insert(
            [
                'cart_id' => random_int(1, 10),
                'tag_id' => random_int(1, 11),
                'total_quatity' => random_int(1, 11),
                'total_price' => rand(1000000, 10000000),
            ]
                      
        );
        }
    }
}
