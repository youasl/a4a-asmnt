<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
	{
		Schema::create('crops', function (Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->string('crop_name');
			$table->string('crop_type');
			$table->string('scientific_name');
			$table->string('status');
			$table->string('planting_season')->nullable();
			$table->string('harvest_season')->nullable();
			$table->integer('growth_duration')->nullable();
			$table->string('soil_type')->nullable();
			$table->string('climate_requirements')->nullable();
			$table->decimal('average_yield', 8, 2)->nullable();
			$table->string('notes')->nullable();
		});
	}

    public function down(): void
    {
        Schema::dropIfExists('crops');
    }
};