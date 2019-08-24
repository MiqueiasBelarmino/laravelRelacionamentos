<?php

use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::create([
            'country_id'      => '1',
            'latitude'        => '60',
            'longitude'       => '30',
        ]);

        Location::create([
            'country_id'      => '2',
            'latitude'        => '40',
            'longitude'       => '15',
        ]);

        Location::create([
            'country_id'      => '3',
            'latitude'        => '50',
            'longitude'       => '20',
        ]);
    }
}
