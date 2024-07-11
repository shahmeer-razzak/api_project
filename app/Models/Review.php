<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function getCreatedAtFormattedAttribute()
    {
        return $this->created_at->format('d/m/Y'); // Adjust the format as needed
    }
    protected $guarded = [];
    use HasFactory;
}
