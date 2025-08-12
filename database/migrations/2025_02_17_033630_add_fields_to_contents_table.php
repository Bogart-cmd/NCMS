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
    if (Schema::hasTable('content')) {
        Schema::table('content', function (Blueprint $table) {
            if (!Schema::hasColumn('content', 'title')) {
                $table->string('title')->nullable();
            }
            if (!Schema::hasColumn('content', 'content')) {
                $table->text('content')->nullable();
            }
            if (!Schema::hasColumn('content', 'facebook_embed')) {
                $table->text('facebook_embed')->nullable();
            }
            if (!Schema::hasColumn('content', 'img_name')) {
                $table->string('img_name')->nullable();
            }
        });
    }
}

public function down()
{
    if (Schema::hasTable('content')) {
        Schema::table('content', function (Blueprint $table) {
            if (Schema::hasColumn('content', 'title')) {
                $table->dropColumn('title');
            }
            if (Schema::hasColumn('content', 'content')) {
                $table->dropColumn('content');
            }
            if (Schema::hasColumn('content', 'facebook_embed')) {
                $table->dropColumn('facebook_embed');
            }
            if (Schema::hasColumn('content', 'img_name')) {
                $table->dropColumn('img_name');
            }
        });
    }
}

};
