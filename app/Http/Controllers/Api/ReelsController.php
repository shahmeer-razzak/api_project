<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reel;
use Illuminate\Http\Request;

class ReelsController extends ApiController
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
    public function store(Request $request)
    {
        $reels = Reel::create([
            // 'user_id' => $request->user()->id,
            'user_id' => $request->user_id,
            'video' => $request->video,
            'thumbnail' => $request->thumbnail,
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'description' => $request->description,
            'likes' => $request->likes,
            'status' => $request->status,
            'comments' => $request->comments,
        ]);
        return $this->successResponse($reels, 300);
    }
    public function getAll()
    {
         $reels = Reel::with(['user', 'likes', 'comments'])->get();
         return $this->successResponse($reels,' Successful ' ,200 );
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
        $reel = Reel::find($id);
        $reel->update([
            'user_id' => $request->user_id,
            'video' => $request->video,
            'thumbnail' => $request->thumbnail,
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'description' => $request->description,
            'likes' => $request->likes,
            'status' => $request->status,
        ]);
        return $this->successResponse([], 'done', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reel = Reel::find($id);
        $reel->delete();
        return $this->successResponse([], 'done', 200);
    }
}
