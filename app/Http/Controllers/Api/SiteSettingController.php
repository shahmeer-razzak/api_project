<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends ApiController
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
        $sitesetting = SiteSetting::created([
            'logo_img' => $request->logo_img,
            'site_img' => $request->site_img,
            'status' => $request->status,
        ]);
        return $this->successResponse([], 300);
    }
    public function getAll()
    {
        $sitesetting = SiteSetting::get();
         return $this->successResponse($sitesetting,' Successful ' ,200 );
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
        $sitesetting = SiteSetting::find($id);
        $sitesetting->update([
            'logo_img' => $request->logo_img,
            'site_img' => $request->site_img,
            'status' => $request->status,
        ]);
        return $this->successResponse([], 'done', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sitesetting = SiteSetting::find($id);
        $sitesetting->delete();
        return $this->successResponse([], 'done', 200);
    }
}
