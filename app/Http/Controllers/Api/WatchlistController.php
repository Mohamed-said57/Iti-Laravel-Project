<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWatchlistRequest;
use App\Models\Watchlist;

class WatchlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function store(StoreWatchlistRequest $request)
    {
        $watchlist_record = $request->validated();
        Watchlist::firstOrCreate($watchlist_record);
        return response()->json([
            'Message' => 'Added Successfully'
        ], 201);
    }

    public function show(string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
