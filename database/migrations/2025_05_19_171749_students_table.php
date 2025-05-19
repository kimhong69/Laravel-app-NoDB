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
        // Students Schema 
        Schema::create('students', function (Blueprint $table) {
        $table->id();              // id auto-increment primary key
        $table->string('name');
        $table->integer('age');
        $table->string('grade');  // or use integer if you prefer
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
