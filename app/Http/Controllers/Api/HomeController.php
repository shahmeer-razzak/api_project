<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Comment;
use App\Models\CourseSkill;
use App\Models\CourseType;
use App\Models\Like;
use App\Models\Reel;
use App\Models\Review;
use App\Models\Skill;


class HomeController extends Controller
{
    public function index()
    {
        $reel = Reel::all();
        $course = Course::latest()->take(5)->get();
        $courseSkill = CourseSkill::all();
        $courseType = CourseType::all();
        $like = Like::all();
        $review = Review::latest()->take(5)->get();
        $skill = Skill::all();

        return response()->json([
            'course' => $course,
            'courseSkill' => $courseSkill,
            'courseType' => $courseType,
            'like' => $like,
            'reel' => $reel,
            'review' => $review,
            'skill' => $skill,
        ]);
    }
}
