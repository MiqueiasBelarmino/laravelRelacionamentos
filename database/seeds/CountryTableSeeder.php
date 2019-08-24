<?php

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::create([
            'name'      => 'Brasil'
        ]);
        Country::create([
            'name'      => 'Argentina'
        ]);
        Country::create([
            'name'      => 'Peru'
        ]);
        
    }
}
