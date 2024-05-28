<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $authors = [
            [
                'name' => 'Michele',
                'surname' => 'Petrelli',
            ],
            [
                'name' => 'Mario',
                'surname' => 'Petrulli',
            ],
            [
                'name' => 'Mirko',
                'surname' => 'Gianno',
            ],
            [
                'name' => 'Marco',
                'surname' => 'Gino',
            ],
        ];

        foreach($authors as $author){
            Author::create([
                'name' => $author['name'],
                'surname' => $author['surname'],
            ]);
        }


    }
}
