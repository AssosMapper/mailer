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
        Schema::create('personalities', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('profession');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('additionalPhone')->nullable();
            $table->string("fax")->nullable();
            $table->string("additionalFax")->nullable();
            $table->string('full_address')->nullable();
            $table->string('additionalAddress')->nullable();
            $table->string('departmentName')->nullable();
            $table->string('departmentNumber')->nullable();
            $table->string('party')->nullable();
            $table->integer('constituency')->nullable();
            $table->json('urls')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personalities');
    }
};
