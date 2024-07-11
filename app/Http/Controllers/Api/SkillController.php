<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends ApiController
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
        $skill = Skill::create([
            'name' => $request->name,
            'status' => $request->status
        ]);
        return $this->successResponse([], 300);
    }

    public function getAll()
    {
        $skill = Skill::get();
         return $this->successResponse($skill,' Successful ' ,200 );
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
        $skill = Skill::find($id);
        $skill->update([
            'name' => $request->name,
            'status' => $request->status
        ]);
        return $this->successResponse([], 'done', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $skill = Skill::find($id);
        $skill->delete();
        return $this->successResponse([], 'done', 200);
    }
}

