<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;



class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { 
        \App\Models\User::query()->delete();
        
        User::create([
            'name' => 'Admin aplikasi',
            'username' => 'admin_sirebon',
            'level' => 'administrator',
            'email' => 'administrator@gmail.com',
            'password' => bcrypt('admin123'),
            'id_user_group' => 1,
            'remember_token' => Str::random(60),
        ]);
        User::create([
            'name' => 'Wajib Retribusi',
            'username' => 'user_wajibretribusi',
            'level' => 'wajibretribusi',
            'email' => 'wajibretribusi@gmail.com',
            'password' => bcrypt('retribusi123'),
            'id_user_group' => 2,
            'remember_token' => Str::random(60),
        ]);
        User::create([
            'name' => 'Wajib Retribusi',
            'username' => 'retribusi_2',
            'level' => 'wajibretribusi',
            'email' => 'wajibretribusi2@gmail.com',
            'password' => bcrypt('retribusi123'),
            'id_user_group' => 2,
            'remember_token' => Str::random(60),
        ]);

    }
}
