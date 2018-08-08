<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddThumbnailImageColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lara_gallery_albums', function (Blueprint $table) {
            $table->unsignedInteger('cover_id')
                ->after('category')
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lara_gallery_albums', function (Blueprint $table) {
            $table->dropColumn('cover_id');
        });
    }
}
