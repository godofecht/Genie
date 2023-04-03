<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brand = new Brand([
            'id' => 1,
            'site_title' => 'Genie',
            'slogan' => 'Unleash Your Writing Potential',
            'email' => 'support@krashless.com',
            'address' => '153 Williamson Plaza, Maggieberg',
            'phone' => '+1 (062) 109-9222',
            'version' => '1.0.0',
            'facebook' => '',
            'instagram' => '',
            'twitter' => '',
            'youtube' => '',
            'google' => '',
        ]);
        $brand->addMediaFromUrl(DatabaseSeeder::STORAGE_BASE_URL . 'logo.png')->toMediaCollection('logo');
        $brand->addMediaFromUrl(DatabaseSeeder::STORAGE_BASE_URL . 'favicon.ico')->toMediaCollection('favicon');
        $brand->save();
    }
}
