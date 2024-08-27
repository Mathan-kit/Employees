<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('gender',['male','female','others']);
            $table->date('date_of_birth');
            $table->string('address');
            $table->bigInteger('phone');
            $table->string('email');
            $table->unsignedBigInteger('dept_id');
            $table->unsignedBigInteger('designation_id');
            $table->string('image');
            $table->date('date_of_joining');
            $table->foreign('dept_id')->references('id')->on('departments');
            $table->foreign('designation_id')->references('id')->on('designations');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
