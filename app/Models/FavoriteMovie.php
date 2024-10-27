<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteMovie extends Model
{
    use HasFactory;
    protected $table = 'favorite_movies';
    protected $guarded = []; 
}
