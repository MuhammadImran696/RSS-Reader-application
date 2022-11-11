<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rss_items', function (Blueprint $table) {
            $table->id();
            $table->string("Title", 255);
            $table->string("source", 255);
            $table->string("sourceUrl", 255);
            $table->string("link", 255);
            $table->string("publishDate");
            $table->text("description");
            $table->UnSignedBigInteger("url_id");
            $table->foreign("url_id")->on("urls")->references("id");
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
        Schema::dropIfExists('rss_items');
    }
};
