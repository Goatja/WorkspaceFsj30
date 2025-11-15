<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PedidosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pedidos')->insert([
            [
                'user_id' => 1,
                'producto' => 'Laptop',
                'cantidad' => 1,
                'total' => 1200.50,
            ],
            [
                'user_id' => 2,
                'producto' => 'Mouse',
                'cantidad' => 2,
                'total' => 75.00,
            ],
            [
                'user_id' => 2,
                'producto' => 'Teclado',
                'cantidad' => 1,
                'total' => 150.75,
            ],
            [
                'user_id' => 3,
                'producto' => 'Monitor',
                'cantidad' => 1,
                'total' => 220.00,
            ],
            [
                'user_id' => 5,
                'producto' => 'Webcam',
                'cantidad' => 1,
                'total' => 90.25,
            ],
        ]);
    }
}