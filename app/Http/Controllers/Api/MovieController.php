<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\MovieResource;
use App\Models\Movie;

class MovieController extends Controller
{

    public function index()
    {
        $movies = Movie::all();
        return response()->json([
            'Message' => 'Movies Fetched Successfully',
            'Movies' => MovieResource::collection($movies)
        ]);
    }

    public function show(string $id)
    {
        $movie = Movie::find($id);
        return response()->json([
            'Movie Details' => MovieResource::make($movie)
        ]);
    }

}
