<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWatchlistRequest;
use App\Http\Resources\Api\MovieResource;
use App\Models\Movie;
use App\Models\Watchlist;
use Illuminate\Http\Request;

class WatchlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->validate([
            'device_id' => ['required', 'string']
        ]);

        $device_id = $request->device_id;

        $movies = Movie::Select('movies.*')
            ->join('watchlists', 'movies.id', '=', 'watchlists.movie_id')
            ->where('device_id', $device_id)
            ->get();

        return response()->json([
            'Message' => 'Watchlist retrived successfully',
            'Device Id' => $device_id,
            'Movies'  => MovieResource::collection($movies)
        ]);
    }

    public function store(StoreWatchlistRequest $request)
    {
        $watchlist_record = $request->validated();
        Watchlist::firstOrCreate($watchlist_record);
        return response()->json([
            'Message' => 'Added Successfully'
        ], 201);
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'device_id' => ['required', 'string'],
            'movie_id'  => ['required', 'exists:watchlists,movie_id']
        ]);

        $watchlist_record = Watchlist::where('device_id', $request->device_id)
            ->where('movie_id', $request->movie_id)
            ->first();

        if ($watchlist_record) 
        {
            $watchlist_record->delete();
            return response()->json(['message' => 'Movie removed successfully'], 200);
        }
        else
        {
            return response()->json(['message' => 'Movie not found in watchlist'], 404);
        }
    }

    public function table()
    {
        $watchlists = Watchlist::all();

        $data = $watchlists->map(function ($item) {
            return [
                'Watchlist_id' => $item->id,
                'Device_id' => $item->device_id,
                'Movie_id' => $item->movie_id,
                'Created_at' => $item->created_at->format('Y-m-d H:i:s')
            ];
        });

        return response()->json($data);
    }
}
