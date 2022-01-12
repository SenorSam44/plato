<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = ['member_name', 'department_id', 'member_description', 'member_designation', 'member_image', 'publication_status'];
}
