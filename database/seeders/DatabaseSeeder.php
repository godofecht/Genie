<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    const STORAGE_BASE_URL = "https://krashless.ams3.digitaloceanspaces.com/seeds%2F";

    public function run()
    {
        $this->call([
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,
            CategorySeeder::class,
            QuestionSeeder::class,
            ToneSeeder::class,
            PromptSeeder::class,
            PromptQuestionSeeder::class,
            CurrencySeeder::class,
            PlanSeeder::class,
            PaymentMethodSeeder::class,
            SubscriptionSeeder::class,
            SettingSeeder::class,
            BrandSeeder::class,
            ThirdPartySeeder::class,
            HeroSeeder::class,
            PartnerSeeder::class,
            TestimonialSeeder::class,
            PricingSeeder::class,
            BlockSeeder::class,
            StorySeeder::class,
            LandingPageSeeder::class,
            EngineSeeder::class,
            EnginePermissionsSeeder::class,
            LanguageSeeder::class,
            LanguagePermissionsSeeder::class,
            PromptsSeederV2::class,
            AIPRMPromptsSeeder::class
        ]);
    }
}
