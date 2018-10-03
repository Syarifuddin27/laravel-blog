<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::create([
            'name' => 'Syarifuddin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'admin' => 1
        ]);
        App\Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatars/1.jpg',
            'about' => 'Apapun Oke Asal Jalan.',
            'facebook' => 'facebook.com/syarifuddin27',
            'youtube' => 'youtube.com'
        ]);
    }
}
