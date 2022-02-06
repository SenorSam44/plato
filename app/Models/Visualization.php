<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visualization extends Model
{

    protected $fillable = ['visualization_title','visualization_subtitle', 'visualization_description', 'visualization_image', 'publication_status'];
}
