<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('order_id')->unsigned()->nullable();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->integer('canvas_height')->nullable();
            $table->integer('canvas_width')->nullable();
            $table->string('imagePath')->nullable();
            $table->string('domImage')->nullable();
            $table->string('image_type')->nullable();
            $table->string('canvas_type')->nullable();
            $table->string('color')->nullable();
            $table->string('quantity')->nullable();
            $table->string('gift_option')->nullable();
            $table->string('messageType')->nullable();
            $table->string('messageTo')->nullable();
            $table->string('messageFrom')->nullable();
            $table->string('message')->nullable();
            $table->string('removed_by')->nullable();
            $table->string('remove_reason')->nullable();
            $table->string('price')->nullable();
            $table->string('discount')->nullable();
            $table->string('offer')->nullable();
            $table->string('tax_collected')->nullable();
            $table->string('grand_total')->nullable();
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
        Schema::dropIfExists('order_details');
    }
}
