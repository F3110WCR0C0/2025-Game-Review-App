<?php

namespace Database\Seeders;

use App\Models\Developer;
use App\Models\Game;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class GameSeeder extends Seeder
{
    public function run(): void
    {
        $currentTimestamp = Carbon::now();

        $games = [
            [
                'name'=> 'Monster Hunter: World',
                'release_date'=> '2018-08-08',
                'description'=> 'Welcome to a new world! In Monster Hunter: World, the latest installment in the series, you can enjoy the ultimate hunting experience, using everything at your disposal to hunt monsters in a new world teeming with surprises and excitement.',
                'age_rating'=> '16',
                'price'=> 29.99,
                'discount'=> 0.67,
                'image'=> 'Monster_Hunter_World.jpg'
            ],
            [
                'name'=> 'Barony',
                'release_date'=> '2015-06-23',
                'description'=> 'Barony is the premier first-person roguelike with cooperative play! Adventure alone, or gather a party with iconic and unusual RPG classes to face off against the brutal dungeons. Test your resourcefulness, wits, and friendships, on your quest to lift the evil lichs curse!',
                'age_rating'=> '16',
                'price'=> 19.50,
                'discount'=> 0.25,
                'image'=> 'Barony.jpg'
            ],
            [
                'name'=> 'Skyrim',
                'release_date'=> '2016-10-28',
                'description'=> 'Winner of more than 200 Game of the Year Awards, The Elder Scrolls V: Skyrim Special Edition brings the epic fantasy to life in stunning detail. The Special Edition includes the critically acclaimed game and add-ons with all-new features.',
                'age_rating'=> '18',
                'price'=> 39.99,
                'discount'=> 0.75,
                'image'=> 'Skyrim.jpg'
            ],
            [
                'name'=> 'The Witcher 3: Wild Hunt',
                'release_date'=> '2015-05-19',
                'description'=> 'You are Geralt of Rivia, mercenary monster slayer. Before you stands a war-torn, monster-infested continent you can explore at will. Your current contract? Tracking down Ciri — the Child of Prophecy, a living weapon that can alter the shape of the world.',
                'age_rating'=> '18',
                'price'=> 49.99,
                'discount'=> 0.50,
                'image'=> 'The_Witcher_3_Wild_Hunt.jpg'
            ],
            [
                'name'=> 'Celeste',
                'release_date'=> '2018-01-25',
                'description'=> 'Help Madeline survive her inner demons on her journey to the top of Celeste Mountain, in this super-tight platformer from the creators of TowerFall. Brave hundreds of hand-crafted challenges, uncover devious secrets, and piece together the mystery of the mountain.',
                'age_rating'=> '12',
                'price'=> 19.99,
                'discount'=> 0.30,
                'image'=> 'Celeste.jpg'
            ],
            [
                'name'=> 'Hollow Knight',
                'release_date'=> '2017-02-24',
                'description'=> 'Forge your own path in Hollow Knight! An epic action adventure through a vast ruined kingdom of insects and heroes. Explore twisting caverns, battle tainted creatures and befriend bizarre bugs, all in a classic, hand-drawn 2D style.',
                'age_rating'=> '12',
                'price'=> 14.99,
                'discount'=> 0.40,
                'image'=> 'Hollow_Knight.jpg'
            ],
            [
                'name'=> 'Dark Souls III',
                'release_date'=> '2016-04-12',
                'description'=> 'Dark Souls continues to push the boundaries with the latest, ambitious chapter in the critically-acclaimed and genre-defining series. Prepare yourself and Embrace The Darkness!',
                'age_rating'=> '18',
                'price'=> 59.99,
                'discount'=> 0.60,
                'image'=> 'Dark_Souls_3.jpg'
            ],
            [
                'name'=> 'Stardew Valley',
                'release_date'=> '2016-02-26',
                'description'=> 'You have inherited your grandfathers old farm plot in Stardew Valley. Armed with hand-me-down tools and a few coins, you set out to begin your new life. Can you learn to live off the land and turn these overgrown fields into a thriving home?',
                'age_rating'=> '7',
                'price'=> 14.99,
                'discount'=> 0.20,
                'image'=> 'Stardew_Valley.jpg'
            ]
        ];

        Game::insert($games);

        foreach ($games as $gameData) {
            $game = Game::where('name', $gameData['name'])->first(); 
            if ($game) {
                $developers = Developer::inRandomOrder()->take(2)->pluck('id');
                $game->developers()->attach($developers);
            }
        }
    }
}