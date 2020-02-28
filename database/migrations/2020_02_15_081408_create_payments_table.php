<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('order_id');
            $table->bigInteger('tracking_id');
            $table->longText('bank_ref_no');
            $table->string('order_status');
            $table->string('failure_message');
            $table->string('payment_mode');
            $table->string('card_name');
            $table->string('status_code');
            $table->string('status_message');
            $table->string('currency');
            $table->string('amount');
            $table->string('billing_name');
            $table->longText('billing_address');
            $table->string('billing_city');
            $table->string('billing_state');
            $table->string('billing_zip');
            $table->string('billing_country');
            $table->string('billing_tel');
            $table->string('billing_email');
            $table->string('delivery_name');
            $table->longText('delivery_address');
            $table->string('delivery_city');
            $table->string('delivery_state');
            $table->string('delivery_zip');
            $table->string('delivery_country');
            $table->string('delivery_tel');
            $table->string('vault');
            $table->string('offer_type');
            $table->string('offer_code');
            $table->string('discount_value');
            $table->string('mer_amount');
            $table->string('eci_value');
            $table->string('retry');
            $table->string('response_code');
            $table->string('billing_notes');
            $table->string('trans_date');
            $table->string('bin_country');
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
        Schema::dropIfExists('payments');
    }
}
