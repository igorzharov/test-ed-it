<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('intervals', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('start');
            $table->unsignedInteger('end')->nullable()->default(null);

            // Составной индекс для ускорения выборки
            $table->index(['start', 'end']);
        });
    }

    public function down(): void
    {
        if (app()->isLocal()) {

            Schema::dropIfExists('intervals');
        }
    }
};
