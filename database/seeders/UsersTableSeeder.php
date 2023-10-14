<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $authorRole = Role::where('name', 'author')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@yahoos.com',
            'password' => Hash::make('adminadmin')
        ]);

        $author = User::create([
            'name' => 'author User',
            'email' => 'author@yahoos.com',
            'password' => Hash::make('adminadmin')
        ]);

        $user = User::create([
            'name' => 'Generic User',
            'email' => 'user@yahoos.com',
            'password' => Hash::make('adminadmin')
        ]);

        $admin->roles()->attach($adminRole);
        $author->roles()->attach($authorRole);
        $user->roles()->attach($userRole);

    }
}
