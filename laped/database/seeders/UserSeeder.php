<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Roberto Carlos',
                'email' => 'roberto@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Ana Lopez',
                'email' => 'ana@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Ricardo Gomez',
                'email' => 'ricardo@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Maria Rodriguez',
                'email' => 'maria@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Juan Perez',
                'email' => 'juan@example.com',
                'password' => Hash::make('password'),
            ],
        ]);
    }
}