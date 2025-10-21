<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends seeder{
    public function run(): void{
        $this->call(GameSeeder::class);
    }
}
////////////////////////////////////////////////////////////////////////////////////////////////////
// When Columns is fixed with images and decimals use (php artisan migrate) and (php artisan db:seed)
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use App\Models\Game;

class GameSeeder extends Seeder{
    public function run(): void{
        $currentTimestamp = Carbon::now();

        Game::insert([

            // this is inserting various data into the seeder to then populate the database
            [
                'name'=> 'Monster Hunter: World',
                'release_date'=> '2018-08-08',
                'age_rating'=> '16',
                'price'=> 29.99,
                'discount'=> 0.67,
                'image'=> 'Monster_Hunter_World.jpg'
            ],

            [
                'name'=> 'Barony',
                'release_date'=> '2015-06-23',
                'age_rating'=> '16',
                'price'=> 19.50,
                'discount'=> 0.25,
                'image'=> 'Barony.jpg'
            ],

            [
                'name'=> 'Skyrim',
                'release_date'=> '2016-10-28',
                'age_rating'=> '18',
                'price'=> 39.99,
                'discount'=> 0.75,
                'image'=> 'Skyrim.jpg'
            ],

            [
                'name'=> 'The Witcher 3: Wild Hunt',
                'release_date'=> '2015-05-19',
                'age_rating'=> '18',
                'price'=> 49.99,
                'discount'=> 0.50,
                'image'=> 'The_Witcher_3_Wild_Hunt.jpg'
            ],

            [
                'name'=> 'Celeste',
                'release_date'=> '2018-01-25',
                'age_rating'=> '12',
                'price'=> 19.99,
                'discount'=> 0.30,
                'image'=> 'Celeste.jpg'
            ],
            [
                'name'=> 'Hollow Knight',
                'release_date'=> '2017-02-24',
                'age_rating'=> '12',
                'price'=> 14.99,
                'discount'=> 0.40,
                'image'=> 'Hollow_Knight.jpg'
            ],
            
            
            [
                'name'=> 'Dark Souls III',
                'release_date'=> '2016-04-12',
                'age_rating'=> '18',
                'price'=> 59.99,
                'discount'=> 0.60,
                'image'=> 'Dark_Souls_3.jpg'
            ],
            
            [
                'name'=> 'Stardew Valley',
                'release_date'=> '2016-02-26',
                'age_rating'=> '7',
                'price'=> 14.99,
                'discount'=> 0.20,
                'image'=> 'Stardew_Valley.jpg'
            ]
        ]);
    }
}