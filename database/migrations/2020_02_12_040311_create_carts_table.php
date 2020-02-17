<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->nullable();
            $table->integer('canvasHeight')->nullable();
            $table->integer('canvasWidth')->nullable();
            $table->string('imagePath')->nullable();
            $table->string('domImage')->nullable();
            $table->string('color')->nullable();
            $table->string('zoomValue')->nullable();
            $table->string('imageType')->nullable();
            $table->string('canvasType')->nullable();
            $table->longText('translateData')->nullable();
            $table->longText('imageStyle')->nullable();
            $table->string('fileStatckImageWidth')->nullable();
            $table->string('fileStatckImageHeight')->nullable();
            $table->string('price')->nullable();
            $table->string('quantity')->nullable();
            $table->string('messageType')->nullable();
            $table->string('messageTo')->nullable();
            $table->string('messageFrom')->nullable();
            $table->string('message')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
