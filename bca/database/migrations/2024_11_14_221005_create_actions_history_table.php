<?php

use App\Models\ActionHistory;
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
        Schema::create(ActionHistory::TABLE, function (Blueprint $table) {
            $table->id();
            $table->string(ActionHistory::MESSAGE);
            $table->string(ActionHistory::STATUS);
            $table->text(ActionHistory::LOG);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(ActionHistory::TABLE);
    }
};
