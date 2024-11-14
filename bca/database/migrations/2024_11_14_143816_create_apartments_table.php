<?php

use App\Models\Apartment;
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
        Schema::create(Apartment::TABLE, function (Blueprint $table) {
            $table->id();
            $table->string(Apartment::TYPE);
            $table->string(Apartment::SLUG)->unique()->index();
            $table->string(Apartment::OWNER);
            $table->boolean(Apartment::STATUS);
            $table->float(Apartment::PRICE);
            $table->dateTime(Apartment::DATE_COMPLETED);
            $table->text(Apartment::TERMS);
            $table->text(Apartment::DESCRIPTION);
            $table->string(Apartment::PHOTO);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Apartment::TABLE);
    }
};
