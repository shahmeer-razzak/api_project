<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\CourseSkillController;
use App\Http\Controllers\Api\CourseTypeController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\LikeController;
use App\Http\Controllers\Api\ReelsController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\SiteSettingController;
use App\Http\Controllers\Api\SkillController;
use App\Http\Controllers\Api\UserCourseController;
use App\Http\Controllers\Api\UserController;
use App\Models\Comment;
use App\Models\CourseSkill;
       
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();   
});

    Route::post('/home/index', [HomeController::class, 'index']);

    Route::post('/user/register', [UserController::class, 'register']);
    Route::post('/user/login', [UserController::class, 'login']);

    Route::get('/top-course', [CourseController::class, 'getTopCourse']);
    Route::get('/courses/latest', [CourseController::class, 'getLatestCourses']);
    Route::post('/course/create', [CourseController::class, 'store']);
    Route::get('/course/getAll', [CourseController::class, 'getAll']);
    Route::put('/course/update/{id}', [CourseController::class, 'update']);
    Route::delete('/course/destroy/{id}', [CourseController::class, 'destroy']);

    // Route::post('/comment/create', [CommentController::class, 'store']);
    Route::post('reels/{reel}/comments', [CommentController::class, 'store']);
    Route::get('/comment/getAll', [CommentController::class, 'getAll']);
    Route::put('/comment/update/{id}', [CommentController::class, 'update']);
    Route::delete('/comment/destroy/{id}', [CommentController::class, 'destroy']);

    Route::post('/course_skill/create', [CourseSkillController::class, 'store']);
    Route::get('/course_skill/getAll', [CourseSkillController::class, 'getAll']);
    Route::put('/course_skill/update/{id}', [CourseSkillController::class, 'update']);
    Route::delete('/course_skill/destroy/{id}', [CourseSkillController::class, 'destroy']);

    Route::post('/course_type/create', [CourseTypeController::class, 'store']);
    Route::get('/course_type/getAll', [CourseTypeController::class, 'getAll']);
    Route::put('/course_type/update/{id}', [CourseTypeController::class, 'update']);
    Route::delete('/course_type/destroy/{id}', [CourseTypeController::class, 'destroy']);

    // Route::post('like/create', [LikeController::class, 'store']);
    Route::post('reels/{reel}/like', [LikeController::class, 'store']);
    Route::get('like/getAll', [LikeController::class, 'getAll']);
    Route::put('/like/update/{id}', [LikeController::class, 'update']);
    Route::delete('/like/destroy/{id}', [LikeController::class, 'destroy']);

    // Route::post('reel/create', [ReelsController::class, 'store']);
    Route::apiResource('reels', ReelsController::class);
    Route::get('reel/getAll', [ReelsController::class, 'getAll']);
    Route::put('/reel/update/{id}', [ReelsController::class, 'update']);
    Route::delete('/reel/destroy/{id}', [ReelsController::class, 'destroy']);

    Route::post('review/create', [ReviewController::class, 'store']);
    Route::get('review/getAll', [ReviewController::class, 'getAll']);
    Route::put('/review/update/{id}', [ReviewController::class, 'update']);
    Route::delete('/review/destroy/{id}', [ReviewController::class, 'destroy']);

    Route::post('sitesetting/create', [SiteSettingController::class, 'store']);
    Route::get('sitesetting/getAll', [SiteSettingController::class, 'getAll']);
    Route::put('/sitesetting/update/{id}', [SiteSettingController::class, 'update']);
    Route::delete('/sitesetting/destroy/{id}', [SiteSettingController::class, 'destroy']);
    
    Route::post('skill/create', [SkillController::class, 'store']);
    Route::get('skill/getAll', [SkillController::class, 'getAll']);
    Route::put('/skill/update/{id}', [SkillController::class, 'update']);
    Route::delete('/skill/destroy/{id}', [SkillController::class, 'destroy']);
    
    Route::post('usercourse/create', [UserCourseController::class, 'store']);
    Route::get('usercourse/getAll', [UserCourseController::class, 'getAll']);
    Route::put('/usercourse/update/{id}', [UserCourseController::class, 'update']);
    Route::delete('/usercourse/destroy/{id}', [UserCourseController::class, 'destroy']);