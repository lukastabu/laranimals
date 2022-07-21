<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'algis',
            'email' => 'algis'.'@gmail.com',
            'password' => Hash::make('algis'), 
            'role' => 5,
        ]);

        DB::table('users')->insert([
            'name' => 'bronius',
            'email' => 'bronius'.'@gmail.com',
            'password' => Hash::make('bronius'),
        ]);

        $animals = ['cat', 'dog', 'sheep', 'deer', 'shark', 'bear', 'cow', 'pig', 'bull', 'elephant'];
        $houses = ['lake', 'savana', 'yard', 'field', 'forest', 'sea'];
        
        foreach ($animals as $animal) {
            DB::table('animals')->insert([
                'name' => $animal,
                'house' => $houses[rand(0, count($houses)-1)],
                'weight' => rand(1, 500),
                'species' => rand(1, 3),
            ]);
        }
        
        $foods = ['mouse', 'meat', 'grass', 'sardine', 'tuna', 'plankton', 'hay', 'potatoes', 'grain', 'banana'];
        foreach (range(1, 99) as $_) {

            DB::table('food')->insert([
                'title' => $foods[rand(0, count($foods)-1)],
                'animal_id' => rand(1, count($animals)),
            ]);
        }

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
