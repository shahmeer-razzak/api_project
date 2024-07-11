<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = ['user_id', 'reels_id', 'message', 'status', 'created_at', 'updated_at'];
    // protected $guarded = [];
    
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reel()
    {
        return $this->belongsTo(Reel::class);
    }

//     public function getCreatedAtFormattedAttribute()
// {
//     return $this->created_at->format('d/m/Y');

// }
}
