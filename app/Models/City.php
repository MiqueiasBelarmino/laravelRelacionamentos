<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function companies()
    {
        //criamos a tabela pivo com o nome não ordenado, então devemos especificar esse nome
        //o correto deveria ser city_company, pois ci vem antes de co
        return $this->belongsToMany(Company::class, 'company_city');
    }
}
