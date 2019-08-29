<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use App\Models\Country;
// use App\Models\City;

class State extends Model
{

    protected $fillable = ['name','initials', 'country_id'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable');
    }
}
