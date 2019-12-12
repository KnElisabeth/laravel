<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = ['name','director','duration','year','genre_id'];

    public function genre()
    {
        return $this->belongsTo('App\Genre');
    }
}
