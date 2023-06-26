<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lenguage;

class LenguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lenguages = [
            'HTML',
            'CSS', 
            'JAVASCRIPT', 
            'VUE',
            'PHP',
            'LARAVEL',
            'MYSQL'
        ];
        foreach ($lenguages as $elem){
            $newLenguage = new Lenguage();
            $newLenguage->name=$elem;
            $newLenguage->slug=$elem;
            $newLenguage->save();
        }   
    }
}
