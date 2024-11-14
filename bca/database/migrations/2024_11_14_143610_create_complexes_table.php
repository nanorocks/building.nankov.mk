<?php

use App\Models\Complex;
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
        Schema::create(Complex::TABLE, function (Blueprint $table) {
            $table->id();
            $table->string(Complex::SLUG)->unique()->index();
            $table->string(Complex::NAME);
            $table->string(Complex::LOCATION);
            $table->string(Complex::PHOTO);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Complex::TABLE);
    }
};
