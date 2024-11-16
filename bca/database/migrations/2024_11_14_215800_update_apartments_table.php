<?php


use App\Models\Apartment;
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
            // Add the foreign key column
            $table->unsignedBigInteger(Apartment::R_FLOOR_ID);

            // Define the foreign key constraint
            $table->foreign(Apartment::R_FLOOR_ID)
                ->references(Floor::ID) // Column in the floors table (e.g., 'id')
                ->on(Floor::TABLE)     // The name of the floors table (e.g., 'floors')
                ->onDelete('cascade') // Handle cascading deletes
                ->onUpdate('cascade'); // Handle cascading updates
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table(Apartment::TABLE, function (Blueprint $table) {
            // Drop the foreign key constraint and column
            $table->dropForeign([Apartment::R_FLOOR_ID]);
            $table->dropColumn(Apartment::R_FLOOR_ID);
        });
    }
};
