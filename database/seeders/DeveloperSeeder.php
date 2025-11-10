<?php

namespace Database\Seeders;

use App\Models\Developer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeveloperSeeder extends Seeder
{

    public function run(): void
    {
        Developer::insert([
            ['first_name' => 'Aiden', 'last_name' => 'Walker', 'company' => 'Nintendo'],
            ['first_name' => 'Maya', 'last_name' => 'Hawkins', 'company' => 'Ubisoft'],
            ['first_name' => 'Ethan', 'last_name' => 'Garcia', 'company' => 'Epic Games'],
            ['first_name' => 'Sophia', 'last_name' => 'Lee', 'company' => 'Activision'],
            ['first_name' => 'Liam', 'last_name' => 'Patel', 'company' => 'Sony Interactive Entertainment']
        ]);
    }
}
