<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lara_gallery_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('lara_gallery_album_id');
            $table->string('item_path');
            $table->string('item_thumbnail')->nullable();
            $table->string('original_path')->nullable();
            $table->string('item_type')->default('image');
            $table->unsignedTinyInteger('processed')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lara_gallery_items');
    }
}
