<?php

namespace Database\Seeders;

use App\Models\Tone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ToneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tones = [
            [
                'id' => 1,
                'tone' => 'Friendly',
            ],
            [
                'id' => 2,
                'tone' => 'Luxury',
            ],
            [
                'id' => 3,
                'tone' => 'Relaxed',
            ],
            [
                'id' => 4,
                'tone' => 'Professional',
            ],
            [
                'id' => 5,
                'tone' => 'Bold',
            ],
            [
                'id' => 6,
                'tone' => 'Adventurous',
            ],
            [
                'id' => 7,
                'tone' => 'Witty',
            ],
            [
                'id' => 8,
                'tone' => 'Persuasive',
            ],
            [
                'id' => 9,
                'tone' => 'Empathetic',
            ],
        ];

        Tone::insert($tones);
    }
}
