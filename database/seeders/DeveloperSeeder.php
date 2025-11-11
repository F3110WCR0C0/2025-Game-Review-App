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
            ['first_name' => 'Ryozo', 'last_name' => 'Tsujimoto', 'company' => 'Capcom'],            
            ['first_name' => 'Kristoffer', 'last_name' => 'Zetterstrand', 'company' => 'Barony'],     
            ['first_name' => 'Todd', 'last_name' => 'Howard', 'company' => 'Bethesda'],              
            ['first_name' => 'Marcin', 'last_name' => 'Iwiński', 'company' => 'CD Projekt Red'],    
            ['first_name' => 'Matt', 'last_name' => 'Thorson', 'company' => 'Matt Makes Games'],  
            ['first_name' => 'William', 'last_name' => 'Patterson', 'company' => 'Team Cherry'],     
            ['first_name' => 'Hidetaka', 'last_name' => 'Miyazaki', 'company' => 'FromSoftware'],    
            ['first_name' => 'Eric', 'last_name' => 'Barone', 'company' => 'ConcernedApe'],  
        ]);
    }
}
