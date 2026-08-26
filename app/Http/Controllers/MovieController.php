<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Models\Movie;
use Illuminate\Support\Facades\File;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('movies.index', compact('movies'));
    }

    public function create()
    {
        return view('movies.create');
    }

    public function store(StoreMovieRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
            $validated['image'] = $imageName;
        }

        Movie::create($validated);

        return redirect()->route('movies.index');
    }

    public function show(string $id)
    {
        $movie = Movie::findOrFail($id);
        return view('movies.show', compact('movie'));
    }

    public function edit(string $id)
    {
        $movie = Movie::findOrFail($id);
        return view('movies.edit', compact('movie'));
    }

    public function update(UpdateMovieRequest $request, string $id)
    {
        $movie = Movie::findOrFail($id);
        $validated = $request->validated();

        if ($request->hasFile('image')) {

            $oldImagePath = public_path('images/' . $movie->image);
            if ($movie->image && File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
            $validated['image'] = $imageName;
        } else {
            unset($validated['image']);
        }

        $movie->update($validated);

        return redirect()->route('movies.index');
    }

    public function destroy(string $id)
    {
        $movie = Movie::findOrFail($id);

        $imagePath = public_path('images/' . $movie->image);
        if ($movie->image && File::exists($imagePath)) {
            File::delete($imagePath);
        }

        $movie->delete();

        return redirect()->route('movies.index');
    }
}
