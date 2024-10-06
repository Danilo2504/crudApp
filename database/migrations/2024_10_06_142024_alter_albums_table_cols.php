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
        Schema::table('albums', function (Blueprint $table) {
            $table->renameColumn('name', 'album_name');
            $table->renameColumn('description', 'album_description');
            $table->renameColumn('image_url', 'image_thumb_url');
            $table->renameColumn('height', 'thumb_height');
            $table->renameColumn('width', 'thumb_width');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('albums', function (Blueprint $table) {
            $table->renameColumn('album_name', 'name');
            $table->renameColumn('album_description', 'description');
            $table->renameColumn('image_thumb_url', 'image_url');
            $table->renameColumn('thumb_height', 'height');
            $table->renameColumn('thumb_width', 'width');
        });
    }
};
