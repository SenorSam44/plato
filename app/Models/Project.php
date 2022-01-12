<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
    	'project_title', 
    	'category_id', 

    	'address', 
    	'land_area', 
    	'occupation_type', 
    	'classification', 
    	'no_of_stories', 
    	'no_of_car_parking', 
    	'apartment_size', 
    	'no_of_apartment', 
    	'no_of_lifts', 
    	'no_of_stairs',
    	'no_of_generator',
    	'project_image10',
    	'water_reserve',

    	'project_description',
    	'start_date', 
    	'end_date',
    	'publication_status'
    ];
                                   
}
