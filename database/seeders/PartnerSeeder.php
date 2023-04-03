<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fitbit = new Partner([
            'id' => 1,
            'title' => 'Fitbit'
        ]);
        $fitbit->addMediaFromUrl(DatabaseSeeder::STORAGE_BASE_URL . 'fitbit-dark.png')->toMediaCollection('logo');
        $fitbit->save();

        $forbes = new Partner([
            'id' => 2,
            'title' => 'Forbes'
        ]);
        $forbes->addMediaFromUrl(DatabaseSeeder::STORAGE_BASE_URL . 'forbes-dark.png')->toMediaCollection('logo');
        $forbes->save();

        $mailChimp = new Partner([
            'id' => 3,
            'title' => 'MailChimp'
        ]);
        $mailChimp->addMediaFromUrl(DatabaseSeeder::STORAGE_BASE_URL . 'mailchimp-dark.png')->toMediaCollection('logo');
        $mailChimp->save();

        $layar = new Partner([
            'id' => 4,
            'title' => 'Layar'
        ]);
        $layar->addMediaFromUrl(DatabaseSeeder::STORAGE_BASE_URL . 'layar-dark.png')->toMediaCollection('logo');
        $layar->save();

        $hubSpot = new Partner([
            'id' => 5,
            'title' => 'HubSpot'
        ]);
        $hubSpot->addMediaFromUrl(DatabaseSeeder::STORAGE_BASE_URL . 'hubspot-dark.png')->toMediaCollection('logo');
        $hubSpot->save();
    }
}
