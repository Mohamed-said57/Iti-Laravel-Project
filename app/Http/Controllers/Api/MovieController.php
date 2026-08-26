<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
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

    public function store(StoreMovieRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            // $image->move(public_path('images'), $imageName);
            $validated['image'] = $imageName;
        }

        Movie::create($validated);

        return response()->json([
            'Message' => 'Movies Stored Successfully'
        ]);
    }



    public function update(UpdateMovieRequest $request, string $id)
    {
        $movie = Movie::findOrFail($id);
        $validated = $request->validated();

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            // $image->move(public_path('images'), $imageName);
            $validated['image'] = $imageName;
        } else {
            unset($validated['image']);
        }

        $movie->update($validated);

        return response()->json([
            'Message' => 'Movie Updated Successfully'
        ]);
    }


    public function destroy(string $id)
    {
        $movie = Movie::findOrFail($id);

        // $imagePath = public_path('images/' . $movie->image);
        // if ($movie->image && File::exists($imagePath)) {
        //     File::delete($imagePath);
        // }

        $movie->delete();

        return response()->json([
            'Message' => 'Movies Deleted Successfully'
        ]);
    }
}
