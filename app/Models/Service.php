<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['service_name', 'service_image', 'service_image2', 'service_description', 'available_time', 'publication_status'];
}
