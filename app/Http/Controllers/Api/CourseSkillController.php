<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CourseSkill;
use Illuminate\Http\Request;

class CourseSkillController extends ApiController
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
        $course_skill =CourseSkill::created([
            'skill_id' => $request->skill_id,
            'course_id' => $request->course_id
        ]);
        return $this->successResponse([], 300);

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
        //
        $course_skill = CourseSkill::find($id);
        $course_skill->update([
            'skill_id' => $request->skill_id,
            'course_id' => $request->course_id
        ]);
        return $this->successResponse([], 'done', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $_skill = CourseSkill::find($id);
        $_skill->delete();
        return $this->successResponse([], 'done', 200);
    }
}
