<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    // public $foreignKey = 'userID';

    public function findUserBasedOnRecipes(){
        return $this->belongsTo(User::class, 'userID');
    }
}
