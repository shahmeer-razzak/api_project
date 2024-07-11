<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Models\Reel;
use Illuminate\Http\Request;

class LikeController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Reel $reels)
    {
        if (!$reels) {
            return response()->json(['error' => 'Reel not found'], 404);
        }
        $likes = Like::create([
            'user_id' => $request->user_id,
            'reels_id' => $request->reels_id,
            'status' => $request->status,

        ]);
        // $likes = new Like();
        // $likes->user_id = $request->user()->id;
        // $likes->reel_id = $reels->id;
        // $likes->save();
        
        return $this->successResponse($likes, 300);
    }

    public function getAll()
    {
        $likes = Like::with(['user', 'reel'])->get();
         return $this->successResponse($likes,' Successful ' ,200 );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $like = Like::find($id);
        $like->update([
            'reel_id' => $request->reel_id,
            'user_id' => $request->user_id,
            'status' => $request->status,
        ]);
        return $this->successResponse([], 'done', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $like = Like::find($id);
        $like->delete();
        return $this->successResponse([], 'done', 200);
    }
}
