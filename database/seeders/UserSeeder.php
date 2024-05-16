<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=> 'Farrux Xudoynazarov',
            'email' =>'farrux123@gmail.com',
            'password' => Hash::make('password')
        ]);

        User::create([
            'name' => 'Ali Aliyev',
            'email' => 'ali123@gmail.com',
            'password' => Hash::make('password')
        ]);
    }
}
