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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();//if user is deleted, delete all offers of this user
            $table->foreignId('species_id');
            $table->foreignId('euthanasia_method_id');

            $table->string('slug')->unique();
            $table->string('type');
            $table->string('strain');
            $table->string('genetics');
            $table->string('sex');
            $table->date('dob');
            $table->string('vital_status')->nullable();
            $table->date('expiration_date')->nullable();
            $table->string('organisation')->nullable();
            $table->string('location')->nullable();
            $table->string('removed_organs')->nullable();
            $table->integer('amount')->nullable();
            $table->longText('description')->nullable();
            $table->timestamp('published_at'); //add a published_at column

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
