<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CourseType;
use Illuminate\Http\Request;

class CourseTypeController extends ApiController
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
        $course_type = CourseType::created([
            'name' => $request->name,
            'status' => $request->status
        ]);
        return $this->successResponse([], 300);
    }

    public function getAll()
    {
        $course_type = CourseType::get();
         return $this->successResponse($course_type,' Successful ' ,200 );
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
        $course_type = CourseType::find($id);
        $course_type->update([
            'name' => $request->name,
            'status' => $request->status,
        ]);
        return $this->successResponse([], 'done', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course_type = CourseType::find($id);
        $course_type->delete();
        return $this->successResponse([], 'done', 200);
    }
}
