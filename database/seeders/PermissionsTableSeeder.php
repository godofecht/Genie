<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'category_create',
            ],
            [
                'id'    => 18,
                'title' => 'category_edit',
            ],
            [
                'id'    => 19,
                'title' => 'category_show',
            ],
            [
                'id'    => 20,
                'title' => 'category_delete',
            ],
            [
                'id'    => 21,
                'title' => 'category_access',
            ],
            [
                'id'    => 22,
                'title' => 'prompt_create',
            ],
            [
                'id'    => 23,
                'title' => 'prompt_edit',
            ],
            [
                'id'    => 24,
                'title' => 'prompt_show',
            ],
            [
                'id'    => 25,
                'title' => 'prompt_delete',
            ],
            [
                'id'    => 26,
                'title' => 'prompt_access',
            ],
            [
                'id'    => 27,
                'title' => 'question_create',
            ],
            [
                'id'    => 28,
                'title' => 'question_edit',
            ],
            [
                'id'    => 29,
                'title' => 'question_show',
            ],
            [
                'id'    => 30,
                'title' => 'question_delete',
            ],
            [
                'id'    => 31,
                'title' => 'question_access',
            ],
            [
                'id'    => 32,
                'title' => 'content_create',
            ],
            [
                'id'    => 33,
                'title' => 'content_edit',
            ],
            [
                'id'    => 34,
                'title' => 'content_show',
            ],
            [
                'id'    => 35,
                'title' => 'content_delete',
            ],
            [
                'id'    => 36,
                'title' => 'content_access',
            ],
            [
                'id'    => 37,
                'title' => 'tone_create',
            ],
            [
                'id'    => 38,
                'title' => 'tone_edit',
            ],
            [
                'id'    => 39,
                'title' => 'tone_show',
            ],
            [
                'id'    => 40,
                'title' => 'tone_delete',
            ],
            [
                'id'    => 41,
                'title' => 'tone_access',
            ],
            [
                'id'    => 42,
                'title' => 'answer_create',
            ],
            [
                'id'    => 43,
                'title' => 'answer_edit',
            ],
            [
                'id'    => 44,
                'title' => 'answer_show',
            ],
            [
                'id'    => 45,
                'title' => 'answer_delete',
            ],
            [
                'id'    => 46,
                'title' => 'answer_access',
            ],
            [
                'id'    => 47,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 48,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 49,
                'title' => 'payment_method_create',
            ],
            [
                'id'    => 50,
                'title' => 'payment_method_edit',
            ],
            [
                'id'    => 51,
                'title' => 'payment_method_show',
            ],
            [
                'id'    => 52,
                'title' => 'payment_method_delete',
            ],
            [
                'id'    => 53,
                'title' => 'payment_method_access',
            ],
            [
                'id'    => 54,
                'title' => 'currency_create',
            ],
            [
                'id'    => 55,
                'title' => 'currency_edit',
            ],
            [
                'id'    => 56,
                'title' => 'currency_show',
            ],
            [
                'id'    => 57,
                'title' => 'currency_delete',
            ],
            [
                'id'    => 58,
                'title' => 'currency_access',
            ],
            [
                'id'    => 59,
                'title' => 'plan_create',
            ],
            [
                'id'    => 60,
                'title' => 'plan_edit',
            ],
            [
                'id'    => 61,
                'title' => 'plan_show',
            ],
            [
                'id'    => 62,
                'title' => 'plan_delete',
            ],
            [
                'id'    => 63,
                'title' => 'plan_access',
            ],
            [
                'id'    => 64,
                'title' => 'subscription_create',
            ],
            [
                'id'    => 65,
                'title' => 'subscription_edit',
            ],
            [
                'id'    => 66,
                'title' => 'subscription_show',
            ],
            [
                'id'    => 67,
                'title' => 'subscription_delete',
            ],
            [
                'id'    => 68,
                'title' => 'subscription_access',
            ],
            [
                'id'    => 69,
                'title' => 'payment_create',
            ],
            [
                'id'    => 70,
                'title' => 'payment_edit',
            ],
            [
                'id'    => 71,
                'title' => 'payment_show',
            ],
            [
                'id'    => 72,
                'title' => 'payment_delete',
            ],
            [
                'id'    => 73,
                'title' => 'payment_access',
            ],
            [
                'id'    => 74,
                'title' => 'payment_management_access',
            ],
            [
                'id'    => 75,
                'title' => 'subscription_management_access',
            ],
            [
                'id'    => 76,
                'title' => 'profile_password_edit',
            ],
            [
                'id'    => 77,
                'title' => 'setting_edit',
            ],
            [
                'id'    => 78,
                'title' => 'brand_edit',
            ],
            [
                'id'    => 79,
                'title' => 'brand_access',
            ],
            [
                'id'    => 80,
                'title' => 'setting_access',
            ],
            [
                'id'    => 81,
                'title' => 'third_party_edit',
            ],
            [
                'id'    => 82,
                'title' => 'third_party_access',
            ],
            [
                'id'    => 83,
                'title' => 'landing_access',
            ],
            [
                'id'    => 84,
                'title' => 'hero_edit',
            ],
            [
                'id'    => 85,
                'title' => 'hero_access',
            ],
            [
                'id'    => 86,
                'title' => 'partner_create',
            ],
            [
                'id'    => 87,
                'title' => 'partner_edit',
            ],
            [
                'id'    => 88,
                'title' => 'partner_delete',
            ],
            [
                'id'    => 89,
                'title' => 'partner_access',
            ],
            [
                'id'    => 90,
                'title' => 'landing_page_edit',
            ],
            [
                'id'    => 91,
                'title' => 'landing_page_access',
            ],
            [
                'id'    => 92,
                'title' => 'story_edit',
            ],
            [
                'id'    => 93,
                'title' => 'story_access',
            ],
            [
                'id'    => 94,
                'title' => 'pricing_edit',
            ],
            [
                'id'    => 95,
                'title' => 'pricing_access',
            ],
            [
                'id'    => 96,
                'title' => 'testimonial_edit',
            ],
            [
                'id'    => 97,
                'title' => 'testimonial_access',
            ],
            [
                'id'    => 98,
                'title' => 'block_create',
            ],
            [
                'id'    => 99,
                'title' => 'block_edit',
            ],
            [
                'id'    => 100,
                'title' => 'block_show',
            ],
            [
                'id'    => 101,
                'title' => 'block_delete',
            ],
            [
                'id'    => 102,
                'title' => 'block_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
