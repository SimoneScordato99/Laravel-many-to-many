<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genere;

class GenereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $generi = [
            'FrontEnd',
            'Backend', 
            'FullStack', 
            'Design'
        ];
        foreach ($generi as $elem){
            $newGenere = new Genere();
            $newGenere->name=$elem;
            $newGenere->slug=$elem;
            $newGenere->save();
        }
    }
}
