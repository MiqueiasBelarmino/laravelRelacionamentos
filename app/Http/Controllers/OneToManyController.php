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
        
        //na mesma consulta, a que busca os países, já busca os estados vinculados a cada um
        // $countries = Country::where('name','LIKE',"%{$value}%")
                    // ->with('states')->get();


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

    public function manyToOne()
    {
        $stateName = 'São Paulo';

        $state = State::where('name',$stateName)->get()->first();

        echo $state->name;

        //$country = $state->country()->get();//retorna um array
        //$country = $state->country()->get()->first();
        $country = $state->country;
        echo "<br>País: {$country->name}";
    }


    public function oneToManyTwo()
    {
        //$country = Country::where('name', 'Brasil')->get()->first();
        $value = 'a';
        $countries = Country::where('name','LIKE',"%{$value}%")->get();
        
        //na mesma consulta, a que busca os países, já busca os estados vinculados a cada um
        // $countries = Country::where('name','LIKE',"%{$value}%")
                    // ->with('states')->get();


        foreach($countries as $country)
        {
            echo "<b>{$country->name}</b>";
            $states = $country->states;

            foreach($states as $state)
            {
                echo "<br> {$state->initials} - {$state->name}: ";

                foreach($state->cities as $city)
                {
                    echo " {$city->name},";
                }
            }

            echo "<hr>";
        }

        
        // $states = $country->states->where('initials','SP');
        // $states = $country->states()->get();
        // $states = $country->states()->where('initials','like','S%')->get();
        
    }

    public function oneToManyInsert()
    {
        $dataForm = [
            'name'      => 'Sei Lá',
            'initials'  => 'SL'
        ];
        $country = Country::where('name','Brasil')->get()->first();
        $country->states()->create($dataForm);

    }

    public function oneToManyInsertTwo()
    {
        $dataForm = [
            'name'       => 'Sei sei',
            'initials'   => 'SS',
            'country_id' => '1'
        ];
        
        $insertState = State::create($dataForm);

    }

}

