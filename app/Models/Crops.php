<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Crops extends Model
{
	protected $table = 'crops';
	protected $primaryKey = 'id';
	
	//Transform dates to a specific format eg. 2025-08-29 07:58:04
	protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];
	
	//These are the only attributes that are allowed to be updated or created (mass assignable)
    protected $fillable = [
		'crop_name',
		'crop_type',
		'scientific_name',
		'status',
		'planting_season',
		'harvest_season',
		'growth_duration',
		'soil_type',
		'climate_requirements',
		'average_yield',
		'notes',
	];
	
	//Automatically fetches related data with the relationship model
	protected $with = [
		'diseases'
	];
	
	//This defines a one-to-many relationship between Crops and CropsDiseases, each crop can have multiple associated disease records, linked through the 'crop_id' foreign key in the crops_diseases table
	public function diseases()
    {
        return $this->hasMany(CropsDiseases::class, 'crop_id');
    }
}
