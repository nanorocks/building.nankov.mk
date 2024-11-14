<?php

use App\Models\Apartment;
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
        Schema::table(Apartment::TABLE, function (Blueprint $table) {

            $table->unsignedBigInteger(Apartment::R_FLOOR_ID);

            $table->foreign(Apartment::R_FLOOR_ID)
                ->references(Floor::TABLE)
                ->on(Floor::TABLE)
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop(Floor::TABLE, Floor::R_BUILDING_ID);
    }
};
