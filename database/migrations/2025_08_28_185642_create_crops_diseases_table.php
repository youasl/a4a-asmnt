<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('crops_diseases', function (Blueprint $table) {
            $table->id();
			$table->timestamps();
			$table->string('disease_name');
			$table->string('scientific_name');
			$table->string('symptoms');
			$table->string('cause')->nullable();
			$table->string('prevention')->nullable();
			$table->string('treatment')->nullable();
			$table->string('severity');
			$table->string('notes')->nullable();
			$table->integer('crop_id');
			
			$table->index('crop_id', 'crop_id_index');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('diseases');
    }
};
