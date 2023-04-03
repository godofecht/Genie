<?php

namespace Database\Seeders;

use App\Models\Engine;
use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = [
            [
                'id'       => 1,
                'language' => 'English'
            ],
            [
                'id'       => 2,
                'language' => 'Spanish'
            ]
        ];

        Language::insert($languages);

        // update settings default language
        \App\Models\Setting::firstOrFail()->update(['language_id' => 1]);
    }
}
