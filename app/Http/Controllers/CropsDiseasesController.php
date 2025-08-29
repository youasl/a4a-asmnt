<?php

namespace App\Http\Controllers;

use App\Models\CropsDiseases;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CropsDiseasesController extends Controller
{
    public function store(Request $request){
		//Validate request data
		$validator = Validator::make($request->all(), [
			'disease_name' => 'required|string|min:1|max:256',
			'scientific_name' => 'required|string|min:1|max:256',
			'symptoms' => 'required|string|min:1|max:256',
			'cause' => 'string|min:1|max:256',
			'prevention' => 'string|min:1|max:256',
			'treatment' => 'string|min:1|max:256',
			'severity' => 'required|string|in:Low,Medium,High',
			'notes' => 'nullable|string|min:1|max:256',
			'crop_id' => 'required|integer',
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
		$disease = CropsDiseases::create($request->all());
		
		//Return a success response along with the data
	    return response()->json([
			"status" => "success",
			"message" => "Disease created successfully",
			"data" => $disease
		], 201);
    }
	
    public function update(Request $request, $id){
		//Try to find the id in the database
		$disease = CropsDiseases::find($id);
		
		//Return error if not found
		if (!$disease) {
			return response()->json([
				"status" => "error",
				"message" => "Disease not found"
			], 404);
		}

		//Validate request data
		$request->validate([
			'disease_name' => 'string|min:1|max:256',
			'scientific_name' => 'string|min:1|max:256',
			'symptoms' => 'string|min:1|max:256',
			'cause' => 'string|min:1|max:256',
			'prevention' => 'string|min:1|max:256',
			'treatment' => 'string|min:1|max:256',
			'severity' => 'string|in:Low,Medium,High',
			'notes' => 'nullable|string|min:1|max:256',
		]);
		
		//Update data in database
		$disease->update($request->all());
		
		//Return a success response along with the data
		return response()->json([
			"status" => "success",
			"message" => "Disease updated successfully",
			"data" => $disease
		], 200);
    }
	
	public function show($id){
		//Try to find the id in the database
		$disease = CropsDiseases::find($id);
		
		//Return error if not found
        if (!$disease) {
            return response()->json([
				"status" => "error",
				"message" => "Disease not found"
			], 404);
        }
		
		//Return a success response along with the requested disease data
	    return response()->json([
			"status" => "success",
			"data" => $disease
		], 200);
    }
	
	public function index(){
		//Get all diseases from the database
		$diseases = CropsDiseases::all();
		
		//Return a success response with all the diseases data
	    return response()->json([
			"status" => "success",
			"data" => $diseases
		], 200);
    }
}
