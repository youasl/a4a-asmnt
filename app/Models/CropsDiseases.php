<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CropsDiseases extends Model
{
	protected $table = 'crops_diseases';
	protected $primaryKey = 'id';
	
	//Transform dates to a specific format eg. 2025-08-29 07:58:04
	protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];
	
	//These are the only attributes that are allowed to be updated or created (mass assignable)
    protected $fillable = [
		'disease_name',
		'scientific_name',
		'symptoms',
		'cause',
		'prevention',
		'treatment',
		'severity',
		'notes',
		'crop_id',
	];
}
