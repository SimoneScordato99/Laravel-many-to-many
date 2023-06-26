<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Faker\Generator as Faker;

class Projectseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        for( $i = 0; $i < 10; $i++){
            $newProject = new Project();
            // $newProject->title = $elem['title'];
            // $newProject->description = $elem['description'];
            // $newProject->thumb = $elem['thumb'];
            // $newProject->type = $elem['type'];
            $newProject->title = $faker->company();
            $newProject->description = $faker->company();
            $newProject->type = $faker->company();
            $newProject->save(); 
        }
    }
}
