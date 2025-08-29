<?php

namespace App\Http\Controllers;

use App\Models\Crops;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CropsController extends Controller
{
    public function store(Request $request){
		//Validate request data
		$validator = Validator::make($request->all(), [
			'crop_name' => 'required|string',
            'crop_type' => 'required|string|in:Grain,Vegetable',
			'scientific_name' => 'required|string',
			'status' => 'required|string|in:Active,Inactive,Discontinued,Experimental',
			'planting_season' => 'string|min:1|max:256',
			'harvest_season' => 'string|min:1|max:256',
			'growth_duration' => 'nullable|integer',
			'soil_type' => 'string|min:1|max:256',
			'climate_requirements' => 'string|min:1|max:256',
			'average_yield' => 'nullable|decimal:2',
			'notes' => 'string|min:1|max:256',
		]);
		
		//Return error if validation fails
		$errors = $validator->errors();
		if ($validator->fails()) {
			return response()->json([
				"status" => "error",
				"message" => "Invalid data",
				"data" => $errors
			], 404);
		}
		
		//Save data to database
		$crop = Crops::create($request->all());
		
		//Return a success response along with the data
	    return response()->json([
			"status" => "success",
			"message" => "Crop created successfully",
			"data" => $crop
		], 201);
    }
	
    public function update(Request $request, $id){
		//Try to find the id in the database
		$crop = Crops::find($id);
		
		//Return error if not found
		if (!$crop) {
			return response()->json([
				"status" => "error",
				"message" => "Crop not found"
			], 404);
		}
		
		//Validate request data
		$request->validate([
			'crop_name' => 'string',
            'crop_type' => 'string|in:Grain,Vegetable',
			'scientific_name' => 'string',
			'status' => 'string|in:Active,Inactive,Discontinued,Experimental',
			'planting_season' => 'string|min:1|max:256',
			'harvest_season' => 'string|min:1|max:256',
			'growth_duration' => 'nullable|integer',
			'soil_type' => 'string|min:1|max:256',
			'climate_requirements' => 'string|min:1|max:256',
			'average_yield' => 'nullable|decimal:2',
			'notes' => 'string|min:1|max:256',
		]);
		
		//Update data in database
		$crop->update($request->all());
		
		//Return a success response along with the data
		return response()->json([
			"status" => "success",
			"message" => "Crop updated successfully",
			"data" => $crop
		], 200);
    }
	
	public function show($id){
		//Try to find the id in the database
		$crop = Crops::find($id);
		
		//Return error if not found
        if (!$crop) {
            return response()->json([
				"status" => "error",
				"message" => "Crop not found"
			], 404);
        }
		
		//Return a success response along with the requested crop data
	    return response()->json([
			"status" => "success",
			"data" => $crop
		], 200);
    }
	
	public function index(){
		//Get all crops from the database
		$crops = Crops::all();
		
		//Return a success response with all the crops data
	    return response()->json([
			"status" => "success",
			"data" => $crops
		], 200);
    }
}
