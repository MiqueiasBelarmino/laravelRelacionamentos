<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;

class OneToManyController extends Controller
{
    public function oneToMany()
    {
        //$country = Country::where('name', 'Brasil')->get()->first();
        $value = 'a';
        $countries = Country::where('name','LIKE',"%{$value}%")->get();
        
        foreach($countries as $country)
        {
            echo "<b>{$country->name}</b>";
            $states = $country->states;

            foreach($states as $state)
            {
                echo "<br> {$state->initials} - {$state->name}";
            }

            echo "<hr>";
        }

        
        // $states = $country->states->where('initials','SP');
        // $states = $country->states()->get();
        // $states = $country->states()->where('initials','like','S%')->get();
        
    }
}
