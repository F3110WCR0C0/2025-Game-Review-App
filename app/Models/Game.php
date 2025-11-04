<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// simple links ot other pages to get functions and objects

class Game extends Model
{
    use HasFactory;
    // makes these colums private and protexted
    protected $fillable = [ 'image', 'name', 'release_date', 'age_rating', 'price','discount'];
    public function feedbacks(){
        return $this->hasMany(Feedback::class);
    }


}

