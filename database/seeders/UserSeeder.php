<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::create([

            'first_name' => 'admin',
            'last_name' => 'admin',
            'email' => 'admin@eco.com',
            'phone' => '+998931234567',
            'password' => Hash::make('12345678'),
        ]);

        $admin->roles()->attach(1);

        $admin = User::create([

            'first_name' => 'Fazliddin',
            'last_name' => 'Qobilov',
            'email' => 'fazliddin@gmail.com',
            'phone' => '+998931234568',
            'password' => Hash::make('12345678'),
        ]);

        $admin->roles()->attach(2);

        User::factory()->count(10)->hasAttached([Role::find(2)])->create();
    }
}
