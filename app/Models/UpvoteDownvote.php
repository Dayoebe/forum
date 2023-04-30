<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpvoteDownvote extends Model
{
    use HasFactory;
    protected $filable = ['is_upvote', 'post_id', 'user_id'];
}
