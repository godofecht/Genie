<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguagePermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languagePermissions = [
            [
                'id' => 108,
                'title' => 'language_create',
            ],
            [
                'id' => 109,
                'title' => 'language_edit',
            ],
            [
                'id' => 110,
                'title' => 'language_show',
            ],
            [
                'id' => 111,
                'title' => 'language_delete',
            ],
            [
                'id' => 112,
                'title' => 'language_access',
            ],
        ];

        Permission::insert($languagePermissions);

        $admin_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));
        $user_permissions = $admin_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 5) != 'user_' && substr($permission->title, 0, 5) != 'role_' && substr($permission->title, 0, 11) != 'permission_';
        });
        Role::findOrFail(2)->permissions()->sync($user_permissions);
    }
}
