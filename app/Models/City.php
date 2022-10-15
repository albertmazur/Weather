<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function weathers(){
        return $this->hasMany(Weather::class);
    }

    public function currentWeather(){
        return $this->weathers()->orderBy("created_at")->first();
    }
}
