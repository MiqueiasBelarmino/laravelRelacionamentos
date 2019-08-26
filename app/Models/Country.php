<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use App\Models\Location;
// use App\Models\State;

class Country extends Model
{
    protected $fillable = ['name'];

    public function location()
    {
        return $this->hasOne(Location::class);
        // return $this->hasOne(Location::class, 'country_id');
    }

    public function states()
    {
        //caso a chave estrangeira não siga o padrao nome da tabela + id
        //return $this->hasMany(State::class,'nomeDaColunaEstrangeiraDeCountry');
        //e caso a chave estrangeira não seja referencia para o id do outra tabela
        //return $this->hasMany(State::class,'nomeDaColunaEstrangeiraDeCountry','nomeDaColunaRepresentada');
        return $this->hasMany(State::class);
    }
}
