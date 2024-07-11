<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Course as ModelsCourse;

class CourseController extends ApiController
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
        $courses =ModelsCourse::create([
                'title' => $request->title,
                'user_id' => $request->user_id,
                'short_description' => $request->short_description,
                'description' => $request->description,
                'img' => $request->img,
                'course_type_id' => $request->course_type_id,
                'status' => $request->status,
        ]);
        return $this->successResponse($courses, 300);

    }
    public function getAll()
    {
        $courses = ModelsCourse::with(['user', 'reel'])
        ->select('course.*', DB::raw('DATE(created_at) as created_date'))->get();

    return $this->successResponse($courses, 'Successful', 200);
    }

    public function getLatestCourses()
    {
        // Fetch the latest courses, you can limit the number if needed
        $courses = ModelsCourse::orderBy('created_at', 'desc')->take(10)->get();
   
        return $this->successResponse($courses, 'Successful', 200);
    }

    public function getTopCourse()
    {
        $course = ModelsCourse::orderBy('purchases_count', 'desc')->first();
        
        if ($course) {
            return response()->json([
                'success' => true,
                'data' => $course
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'No courses found'
            ], 404);
        }
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
        $course = ModelsCourse::find($id);
        $course->update([
            'title' => $request->title,
            'user_id' => $request->user_id,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'img' => $request->img,
            'course_type_id' => $request->course_type_id,
            'status' => $request->status,
        ]);
        return $this->successResponse([], 'done', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = ModelsCourse::find($id);
        $course->delete();
        return $this->successResponse([], 'done', 200);
    }
}
