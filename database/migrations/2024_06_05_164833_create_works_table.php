<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Work;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('works', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->text('description');
            $table->unsignedInteger('salary');
            $table->string('location');
            $table->string('category');
            $table->enum('experience' , Work::$experience);

            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('works');
    }
};
