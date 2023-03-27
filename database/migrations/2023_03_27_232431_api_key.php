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
       Schema::create('api_key', function (Blueprint $table) {
                $table->id();
            $table->string('for_app');
            $table->string('api_key');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrationsx.
     */
    public function down(): void
    {
    Schema::dropIfExists('api_key');
    }


};
