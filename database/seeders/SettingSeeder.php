<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           Setting::create([
            'facebook' => 'http://facebook.com',
            'instagram' => 'http://instagram.com',
            'twitter' => 'http://twitter.com',
            'phone' => '+966 523 458 322',
            'whatsapp' => '+966 523 458 322',
            'email' => 'WNES@example.com',
            'address' => 'KSA,GADh',
            'description_ar' => 'Lorem ipsum dolor sit amet, consectetur',
            'description_en' => 'Lorem dgdfdfh, sgdrg',
        ]);
    }
}
