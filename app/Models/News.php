<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    
    protected $fillable = ['news_title', 'category_id', 'news_description', 'news_url', 'publication_status'];

}
