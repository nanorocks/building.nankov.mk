<?php

use App\Models\Building;
use App\Models\Floor;
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
        Schema::create(Floor::TABLE, function (Blueprint $table) {
            $table->id();
            $table->integer(Floor::SLUG)->unique()->index();
            $table->integer(Floor::FLOOR_NUM);
            $table->integer(Floor::TOTAL_APARTMENTS)->default(0);
            $table->string(Floor::PHOTO);

            $table->unsignedBigInteger(Floor::R_BUILDING_ID);

            $table->foreign(Floor::R_BUILDING_ID)
                ->references(Building::ID)
                ->on(Building::TABLE)
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
        Schema::dropIfExists(Floor::TABLE);
    }
};
