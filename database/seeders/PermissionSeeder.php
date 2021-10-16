<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'user_management',
        ]);

        $permission = Permission::create([
            'name' => 'teacher_dashboard',
        ]);

        $role = Role::find(3);

        $role->givePermissionTo($permission);
    }
}
