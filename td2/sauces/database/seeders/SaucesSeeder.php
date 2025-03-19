<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Sauce;
class SaucesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        // Sauce::factory()->create();

        $userIds = DB::table('users')->pluck('idUser')->toArray();

        $sauces = [
            [
                'user_id' => 1,
                'name' => 'Sriracha',
                'manufacturer' => 'Huy Fong Foods',
                'description' => 'Une sauce piquante thaïlandaise à base de piment, d’ail et de vinaigre.',
                'mainPepper' => 'Piment rouge',
                'imageUrl' => 'https://example.com/sriracha.jpg',
                'heat' => 7,
                'likes' => 15,
                'dislikes' => 3,
                'usersLiked' => json_encode([1, 2, 3, 4, 5]),
                'usersDisliked' => json_encode([6, 7])
            ],
            [
                'user_id' => 2,
                'name' => 'Tabasco',
                'manufacturer' => 'McIlhenny Company',
                'description' => 'Une sauce épicée à base de piments rouges vieillis, de vinaigre et de sel.',
                'mainPepper' => 'Piment Tabasco',
                'imageUrl' => 'https://example.com/tabasco.jpg',
                'heat' => 8,
                'likes' => 22,
                'dislikes' => 4,
                'usersLiked' => json_encode([2, 3, 8, 9]),
                'usersDisliked' => json_encode([1])
            ],
            [
                'user_id' => 3,
                'name' => 'Harissa',
                'manufacturer' => 'Le Phare du Cap Bon',
                'description' => 'Une sauce tunisienne épicée à base de piments rouges, d’ail et d’épices.',
                'mainPepper' => 'Piment rouge séché',
                'imageUrl' => 'https://example.com/harissa.jpg',
                'heat' => 9,
                'likes' => 30,
                'dislikes' => 2,
                'usersLiked' => json_encode([5, 6, 7, 8]),
                'usersDisliked' => json_encode([2])
            ],
            [
                'user_id' => 4,
                'name' => 'Sauce Barbecue',
                'manufacturer' => 'Heinz',
                'description' => 'Une sauce sucrée et fumée parfaite pour les grillades.',
                'mainPepper' => 'Paprika fumé',
                'imageUrl' => 'https://example.com/barbecue.jpg',
                'heat' => 3,
                'likes' => 40,
                'dislikes' => 5,
                'usersLiked' => json_encode([10, 11, 12]),
                'usersDisliked' => json_encode([])
            ],
            [
                'user_id' => 5,
                'name' => 'Wasabi',
                'manufacturer' => 'S&B',
                'description' => 'Une pâte verte japonaise très forte, souvent servie avec des sushis.',
                'mainPepper' => 'Wasabi Japonais',
                'imageUrl' => 'https://example.com/wasabi.jpg',
                'heat' => 10,
                'likes' => 18,
                'dislikes' => 7,
                'usersLiked' => json_encode([13, 14]),
                'usersDisliked' => json_encode([15, 16])
            ],
        ];

        DB::table('sauces')->insert($sauces);

    }
}
