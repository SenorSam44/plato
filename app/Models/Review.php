<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['user_name', 'user_image', 'user_designation', 'review_description', 'rating', 'publication_status'];
}
