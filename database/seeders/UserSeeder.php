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
            'level' => 'administrator',
            'email' => 'administrator@gmail.com',
            'password' => bcrypt('admin'),
            'remember_token' => Str::random(60),
        ]);
        User::create([
            'name' => 'Wajib Retribusi',
            'level' => 'wajibretribusi',
            'email' => 'wajibretribusi@gmail.com',
            'password' => bcrypt('retribusi'),
            'remember_token' => Str::random(60),
        ]);

    }
}
