<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllComment extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function posts()
    {
        return $this->belongsTo(posts::class,'post_id','id');
    }
}
