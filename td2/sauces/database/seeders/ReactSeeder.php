<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sauces =DB::table('sauces')->pluck('idSauce');
        $users =DB::table('users')->pluck('idUser');
        $reactions = ['like', 'dislike'];
        $data = [];
        foreach ($sauces as $sauce) {
            foreach ($users as $user) {
                $data[] = [
                    'idUser' => $user,
                    'sauceId' => $sauce,
                    'reaction' => $reactions[array_rand($reactions)],
                ];
            }
        }
        DB::table('sauce_reacts')->insert($data);
        
    }
}
