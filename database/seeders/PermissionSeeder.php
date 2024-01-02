<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superadminRole = Role::create(['name' => 'Admin']);

        $user = User::factory()->create([
           'name' => 'superadmin',
           'email' => 'admin@admin.com',
           'password' => Hash::make('admin'),           
       ]);
       $user->assignRole($superadminRole);
    }
}
