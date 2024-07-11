<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Reel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CommentController extends ApiController
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
    public function store(Request $request, $reel_id)
    {
        $reel = Reel::find($reel_id);
    
        if (!$reel) {
            return response()->json(['error' => 'Reel not found'], 404);
        }
    
        $validated = $request->validate([
            'user_id' => 'required|integer',
            'message' => 'required|string',
            'status' => 'required|boolean'
        ]);
    
        $comment = $reel->comments()->create([
            'user_id' => $validated['user_id'],
            'message' => $validated['message'],
            'status' => $validated['status']
        ]);
    
        return $this->successResponse($comment, 'Comment added successfully', 201);
    }
    
    public function getAll()
    {
        $comments = Comment::with(['user', 'reel'])
        ->select('comments.*', DB::raw('DATE(created_at) as created_date'))
    ->get();

    return $this->successResponse($comments, 'Successful', 200);
        
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
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'content' => 'required|string',
            'status' => 'required|boolean',
        ]);

        $comment = Comment::findOrFail($id);

        $comment->update([
            'content' => $validated['content'],
            'status' => $validated['status'],
        ]);

        return $this->successResponse([], 'done', 200);
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return $this->successResponse([], 'done', 200);
    }
}
