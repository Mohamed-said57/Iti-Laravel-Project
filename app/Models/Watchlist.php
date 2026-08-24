<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Watchlist extends Model
{
    use HasUuids;

    protected $fillable = ['device_id', 'movie_id'];

    public function movie(){
        return $this->belongsTo(Movie::class);
    }
}
