<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnginePermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            [
                'id' => 103,
                'title' => 'engine_create',
            ],
            [
                'id' => 104,
                'title' => 'engine_edit',
            ],
            [
                'id' => 105,
                'title' => 'engine_show',
            ],
            [
                'id' => 106,
                'title' => 'engine_delete',
            ],
            [
                'id' => 107,
                'title' => 'engine_access',
            ],
        ];

        Permission::insert($permissions);

        $admin_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));
        $user_permissions = $admin_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 5) != 'user_' && substr($permission->title, 0, 5) != 'role_' && substr($permission->title, 0, 11) != 'permission_';
        });
        Role::findOrFail(2)->permissions()->sync($user_permissions);
    }
}
