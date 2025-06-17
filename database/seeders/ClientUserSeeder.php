<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'client@gmail.com'],
            [
                'name' => 'Client',
                'password' => bcrypt('client123'),
                'role' => 'client',
            ]
        );
    }
}
