<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends ApiController
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
        $review = Review::create([
            'rating' => $request->rating,
            'message' => $request->message,
            // 'thumbnail' => $request->thumbnail,  
            'user_id' => $request->user_id,
            'course_id' => $request->course_id,
            'status' => $request->status,
        ]);
        return $this->successResponse([], 300);
    }
    public function getAll()
    {
        $review = Review::get();
         return $this->successResponse($review,' Successful ' ,200 );
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
        $review = Review::find($id);
        $review->update([
            'rating' => $request->rating,
            'user_id' => $request->user_id,
            'course_id' => $request->course_id,
            'message' => $request->message,
            'status' => $request->status,
        ]);
        return $this->successResponse([], 'done', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $review = Review::find($id);
        $review->delete();
        return $this->successResponse([], 'done', 200);
    }
}
