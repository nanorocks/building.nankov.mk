<?php

use App\Models\Building;
use App\Models\Complex;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(Building::TABLE, function (Blueprint $table) {
            $table->id();
            $table->string(Building::NAME);
            $table->string(Building::SLUG)->unique()->index();
            $table->string(Building::LOCATION);
            $table->string(Building::PHOTO);
            $table->integer(Building::TOTAL_FLOORS)->default(0);
            $table->unsignedBigInteger(Building::R_COMPLEX_ID);

            $table->foreign(Building::R_COMPLEX_ID)
                ->references(Complex::ID)
                ->on(Complex::TABLE)
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Building::TABLE);
    }
};
