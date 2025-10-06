<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends seeder{
    public function run(): void{
        $this->call(GameSeeder::Class);
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
            [
                'statistics_id'=> 1,
                'review_id'=> 1,
                'genre_id'=> 1,
                'name'=> 'Monster Hunter: World',
                'release_date'=> '2018-08-08',
                'age_rating'=> '16',
                'price'=> 29.99,
                'discount'=> 0.67,
                'image'=> '../public/images/Monster_Hunter_World'
            ],

            [
                'statistics_id'=> 2,
                'review_id'=> 2,
                'genre_id'=> 2,
                'name'=> 'Barony',
                'release_date'=> '2015-06-23',
                'age_rating'=> '16',
                'price'=> 19.50,
                'discount'=> 0.25,
                'image'=> '../public/images/Barony'
            ],

            [
                'statistics_id'=> 3,
                'review_id'=> 3,
                'genre_id'=> 3,
                'name'=> 'Skyrim',
                'release_date'=> '2016-10-28',
                'age_rating'=> '18',
                'price'=> 39.99,
                'discount'=> 0.75,
                'image'=> '../public/images/Skyrim'
            ],


        ]);
    }
}