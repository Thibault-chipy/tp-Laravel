<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Client::factory()->create([
            'NumeroClient' => '1',
            'Nom' => 'Test Client',
            'Email' => 'aaaaa@eeeee.fr',
            'carteBancaire' => '1234567890123456',
        ]);

        
    }
    
}
