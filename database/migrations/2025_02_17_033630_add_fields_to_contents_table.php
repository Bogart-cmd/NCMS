<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('content', function (Blueprint $table) {
        $table->string('title')->nullable();
        $table->text('content')->nullable();
        $table->text('facebook_embed')->nullable();
        $table->string('img_name')->nullable();
    });
}

public function down()
{
    Schema::table('content', function (Blueprint $table) {
        $table->dropColumn(['title', 'content', 'facebook_embed', 'img_name']);
    });
}

};
