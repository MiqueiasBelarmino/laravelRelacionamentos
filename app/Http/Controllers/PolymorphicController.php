<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\State;
use App\Models\Country;
use App\Models\Comment;

class PolymorphicController extends Controller
{
    public function polymorphic()
    {
        $city = City::where('name', 'Presidente Prudente')->get()->first();

        echo "{$city->name}";

        $comments = $city->comments()->get();

        foreach($comments as $comment)
        {
            echo "<br>{$comment->description}";
        }
    }


    public function polymorphicInsert()
    {
        $city = City::where('name', 'Presidente Prudente')->get()->first();
        echo $city->name;

        $comment = $city->comments()->create([
            'description' => "Novo comentário de PP ".date('YmdHis'),
        ]);

        var_dump($comment);

    }
}
