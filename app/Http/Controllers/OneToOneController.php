<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Location;

class OneToOneController extends Controller
{
    //mostra o país e a localização relacionada a ele
    public function oneToOne()
    {
        $country = Country::find(1);
        // $country = Country::where('name','Brasil')->get()->first();
        echo $country->name;

        $location = $country->location;
        echo "<hr> latitude: {$location->latitude}";
        echo "longitude: {$location->longitude}";
    }

    //mostra o país qual a localização pertence através da própria localização
    public function oneToOneInverse()
    {
        $latitude = 60;
        $longitude = 30;

        // $location = Location::find(1);
        $location = Location::where('latitude', $latitude)
                        ->where('longitude', $longitude)
                        ->get()
                        ->first();

        $country = $location->country;

        echo $country->name;
    }

    public function oneToOneInsert()
    {
        $dataForm = [
            'name'      => 'Bélgica',
            'latitude'  => '78',
            'longitude' =>'87'
        ];

        $country = Country::create($dataForm);

        $dataForm['country_id'] = $country->id;
        // $location = Location::create($dataForm);

        $location = new Location;
        $location->latitude = $dataForm['latitude'];
        $location->longitude = $dataForm['longitude'];
        $location->country_id = $dataForm['country_id'];
        $saveLocation = $location->save();
    }

}
