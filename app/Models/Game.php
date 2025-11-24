<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $fillable = [ 'image', 'name', 'release_date', 'description', 'age_rating', 'price','discount'];

    public function feedbacks(){
        return $this->hasMany(Feedback::class);
    }

    public function developers(){
        return $this->belongsToMany(Developer::class);
    }

}

