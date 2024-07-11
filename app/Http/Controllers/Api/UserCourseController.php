<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserCourse;
use Illuminate\Http\Request;

class UserCourseController extends ApiController
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
        $user_course = UserCourse::created([
            'user_id' => $request->user_id,
            'course_id' => $request->course_id
        ]);
        return $this->successResponse([], 300);
    }

    public function getAll()
    {
        $user_course = UserCourse::get();
         return $this->successResponse($user_course,' Successful ' ,200 );
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
        $user_course = UserCourse::find($id);
        $user_course->update([
            'user_id' => $request->user_id,
            'course_id' => $request->course_id
        ]);
        return $this->successResponse([], 'done', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user_course = UserCourse::find($id);
        $user_course->delete();
        return $this->successResponse([], 'done', 200);
    }
}
