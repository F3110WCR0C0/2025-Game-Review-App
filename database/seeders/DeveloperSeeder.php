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
            ['first_name' => 'Ryozo', 'last_name' => 'Tsujimoto', 'company' => 'Capcom', 'bio' => 'After graduating from university, Tsujimoto joined Capcom in April 1996. As an avid video game fan since childhood, he wanted to work on games directly. He has also said that he feels he would "never be good" at an ordinary office workplace.', 'image' => 'Ryozo_Tsujimoto.jpg'],            
            ['first_name' => 'Kristoffer', 'last_name' => 'Zetterstrand', 'company' => 'Barony', 'bio' => 'Artes in Madrid. Zetterstrands works are influenced by both classical and Renaissance artwork, as well as computer graphics and 3D modeling. His debut exhibition in 2002 consisted of compilations for the game Counter-Strike. In 2010, Markus Persson, Zetterstrands former brother-in-law, included some of Zetterstrands paintings in his game Minecraft, a sandbox and survival game inspired by Infiniminer. Since then, these paintings have become an iconic part of the game. In June 2024, Mojang Studios collaborated with Zetterstrand to add fifteen more paintings to Minecraft in commemoration of the games fifteenth anniversary. His paintings are often based on virtual still lifes and scenography sculpted in 3D applications, and he has broadened his sources of images to include vintage photography and imagery.', 'image' => 'Kristoffer_Zetterstrand.jpg'],     
            ['first_name' => 'Todd', 'last_name' => 'Howard', 'company' => 'Bethesda', 'bio' => 'Todd Andrew Howard (born 1970) is an American video game designer, director, and producer. He serves as director and executive producer at Bethesda Game Studios, where he has led the development of the Fallout and The Elder Scrolls series. He was also the game director for Starfield.', 'image' => 'Todd_Howard.jpg'],              
            ['first_name' => 'Marcin', 'last_name' => 'Iwiński', 'company' => 'CD Projekt Red', 'bio' => 'Marcin Piotr Iwiński (born June 30, 1974[1]) – Polish entrepreneur, co-founder (alongside Michał Kiciński) of CDProjekt, principal shareholder of CD Projekt S.A. (the leading company of the capital group that also owns GOG.com), holding 12.78% of shares. Graduate of the Faculty of Management at the University of Warsaw, majoring in management and marketing.', 'image' => 'Marcin_Iwiński.jpg'],    
            ['first_name' => 'Matt', 'last_name' => 'Thorson', 'company' => 'Matt Makes Games', 'bio' => 'Madeline Stephanie Thorson was born on 18 March 1988. Thorson attended college at Grande Prairie Regional College in Alberta, Canada, where she studied computer science. During one summer, she worked at HermitWorks Entertainment, a local video game development studio.', 'image' => 'Matt_Thorson.jpg'],  
            ['first_name' => 'William', 'last_name' => 'Pellen', 'company' => 'Team Cherry', 'bio' => 'William Pellen is an Australian video game designer and former web designer, best known for his work on Hollow Knight (2017) and its sequel, Hollow Knight: Silksong (2025). He is also the co-founder and co-director of the games development studio, Team Cherry. He is married to Victoria Pellen and has two children, with a third on the way as of August 2025.', 'image' => 'William_Pellen.jpg'],     
            ['first_name' => 'Hidetaka', 'last_name' => 'Miyazaki', 'company' => 'FromSoftware', 'bio' => 'Hidetaka Miyazaki (Japanese: 宮崎 英高, Hepburn: Miyazaki Hidetaka; born September 19, 1974) is a Japanese video game director, designer, writer, and president of the game developer FromSoftware. He joined the company in 2004 and served as a designer for the Armored Core series before gaining wider recognition for creating the Dark Souls series. Miyazaki was promoted to company president in 2014 and also serves as its representative director. Other similar games he has directed include Demons Souls, Bloodborne, Sekiro, and Elden Ring.', 'image' => 'Hidetaka_Miyazaki.jpg'],    
            ['first_name' => 'Eric', 'last_name' => 'Barone', 'company' => 'ConcernedApe', 'bio' => 'Barone was born on December 3, 1987, in Los Angeles, California, and spent his childhood in Auburn, Washington, a suburb in the Seattle metropolitan area. He cites the Harvest Moon series as his childhood favorite that stayed with him into adulthood. While not musically trained, Barone played music growing up and was a member of several bands, including a nu metal band and an experimental pop band. For the latters album, he created his first-ever video game, a LucasArts-inspired point-and-click adventure.', 'image' => 'Eric_Barone.jpg'],  
        ]);
    }
}
