<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('intro_images', function (Blueprint $table) {
            $table->unique('order', 'intro_images_order_unique');
        });
    }

    public function down(): void
    {
        Schema::table('intro_images', function (Blueprint $table) {
            $table->dropUnique('intro_images_order_unique');
        });
    }
};
