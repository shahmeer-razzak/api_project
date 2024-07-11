<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseType extends Model
{
    protected $guarded = [];
    use HasFactory;
    protected $hidden = ['created_at', 'updated_at'];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
