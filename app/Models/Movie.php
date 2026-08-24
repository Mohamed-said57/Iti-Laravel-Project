<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasUuids;

    protected $fillable = [
        'title',
        'description',
        'release_year',
        'rating',
        'image',
    ];

    public function watchlists(){
        return $this->hasMany(Watchlist::class);
    }
}
