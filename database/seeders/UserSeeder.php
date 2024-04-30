<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nick' => 'admin',
            'password' => '$2y$12$bQ27WXfnSaonteJcnqUkBepL4Gp6qxAKdkR6xc6m2Ar/iWRsts5hK'
        ]);
    }
}
