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
        Schema::create('websites', function(Blueprint $table){
            $table->id();
            $table->string('website_name');
            $table->string('website_description');
            $table->string('website_price');
            $table->string('website_thumbnail');
            $table->json('website_preview');
            $table->string('demo_link');
            $table->json('tech_stack');
            $table->enum('status', ['dijual', 'tidak dijual'])->default('tidak dijual');
            $table->json('category');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('websites');
    }
};
