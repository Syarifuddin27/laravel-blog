<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Setting::create([
            "site_name" => "Narucoha Blog",
            "contact_number" => "081 751 009 22",
            "contact_email" => "info@laravel_blog.com",
            "address" => "Madura Indonesia"
        ]);
        
    }
}
