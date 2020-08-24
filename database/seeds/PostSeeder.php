<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Post::class, 15)->create();
    // $faker = Faker::class;
    // $faker = Faker::create();
    //     for($i=0;$i<15;$i++){
    //         $data[$i] = [
    //             'user_id' => 1,
    //             'title' => $faker->name,
    //             'slug' => Str::random(10),
    //             'content' => $faker->text,
    //             'harga_jual' => $faker->unique(false)->numberBetween(50000, 100000),
    //             'harga_grosir' => $faker->unique(false)->numberBetween(25000, 50000),
    //             'qty' => $faker->unique(true)->numberBetween(5, 20),
    //             'featured' => 'uploads/posts/education.jpg',
    //             'category_id' => $faker->unique(false)->numberBetween(1, 5),
    //         ];
    //     }
        
    //     DB::table('posts')->insert($data);
    }
}
