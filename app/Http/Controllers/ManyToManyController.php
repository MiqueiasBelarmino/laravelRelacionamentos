<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Company;

class ManyToManyController extends Controller
{
    public function manyToMany()
    {
        $city = City::where('name', 'Presidente Prudente')->get()->first();
        echo "{$city->name}<br>";

        $companies = $city->companies;

        foreach($companies as $company)
        {
            echo "{$company->name}, ";
        }
    }

    public function manyToManyInverse()
    {
        $company = Company::where('name', 'Empresa A')->get()->first();
        echo "{$company->name}<br>";

        $cities = $company->cities;

        foreach($cities as $city)
        {
            echo "{$city->name}, ";
        }
    }

    //Insere a empresa nas cidade de id 3 e 4
    public function manyToManyInsert()
    {
        $dataForm = [3,4];
        $company = Company::where('name', 'Empresa A')->get()->first();
        
        // $company->cities()->attach($dataForm);//vai adicionando independente de já estar vinculado
        // $company->cities()->sync($dataForm);//remove os que já tem e coloca os novos
        // $company->cities()->detach();//remove todas as cidades da empresa
        // $company->cities()->detach($dataForm);//remove as cidades especificadas

        $cities = $company->cities;

        foreach($cities as $city)
        {
            echo "{$city->name}, ";
        }
    }
}
