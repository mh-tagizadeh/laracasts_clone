<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'admin',
        ]);

        Role::create([
            'name' => 'member',
        ]);

        Role::create([
            'name' => 'teacher',
        ]);

        $user = User::where('email', 'admin@admin.com')->first();
        $user->assignRole('admin');
    }
}
