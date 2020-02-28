@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card" style="float:left; width:100%">
                <div class="header">
                    <h2>Payment Details</h2>
                </div>
                <div class="body">
                    <div class="order_detail" style="float:left; width:100%">
                        <h4>Order Details</h4>
                        <hr/>
                        <div class="col-md-6 ">
                            <p><b>Order Id:</b> {{ $payment->order_id }}</p>
                            <p><b>Order status:</b> {{ $payment->order_status }}</p>
                            <p><b>Payment mode:</b> {{ $payment->payment_mode }}</p>
                            <p><b>Status code:</b> {{ $payment->status_code }}</p>
                            <p><b>Status message:</b> {{ $payment->status_message }}</p>
                            <p><b>Failing message:</b> {{ $payment->failure_message }}</p>
                        </div>
                        <div class="col-md-6 ">
                            <p><b>Tracking Id:</b> {{ $payment->tracking_id }}</p>
                            <p><b>Bank reference no:</b> {{ $payment->bank_ref_no }}</p>
                            <p><b>Card name:</b> {{ $payment->card_name }}</p>
                            <p><b>Currency:</b> {{ $payment->currency }}</p>
                            <p><b>Amount:</b> {{ $payment->amount }}</p>
                        </div>
                    </div>
                    <div class="order_detail" style="float:left; width:100%">
                        <h4>Billing & Shipping Details</h4>
                        <hr/>
                        <div class="col-md-6 ">
                            <p><b>Billing name:</b> {{ $payment->billing_name }}</p>
                            <p><b>Billing address:</b> {{ $payment->billing_address }}</p>
                            <p><b>Billing city:</b> {{ $payment->billing_city }}</p>
                            <p><b>Billing state:</b> {{ $payment->billing_state }}</p>
                            <p><b>Billing zipcode:</b> {{ $payment->billing_zip }}</p>
                            <p><b>Billing country:</b> {{ $payment->billing_country }}</p>
                            <p><b>Billing mobile no:</b> {{ $payment->billing_tel }}</p>
                            <p><b>Billing Email:</b> {{ $payment->billing_email }}</p>
                        </div>
                        <div class="col-md-6 ">
                            <p><b>Delivery name:</b> {{ $payment->delivery_name }}</p>
                            <p><b>Delivery address:</b> {{ $payment->delivery_address }}</p>
                            <p><b>Delivery city:</b> {{ $payment->delivery_city }}</p>
                            <p><b>Delivery state:</b> {{ $payment->delivery_state }}</p>
                            <p><b>Delivery zipcode:</b> {{ $payment->delivery_zip }}</p>
                            <p><b>Delivery country:</b> {{ $payment->delivery_country }}</p>
                            <p><b>Delivery mobile no.:</b> {{ $payment->delivery_tel }}</p>
                        </div>
                    </div>
                    <div class="order_detail" style="float:left; width:100%">
                        <h4>Other Details</h4>
                        <hr/>
                        <div class="col-md-6 ">
                            <p><b>Valt:</b> {{ $payment->vault }}</p>
                            <p><b>Offer type:</b> {{ $payment->offer_type }}</p>
                            <p><b>Offer code:</b> {{ $payment->offer_code }}</p>
                            <p><b>Discount value:</b> {{ $payment->discount_value }}</p>
                            <p><b>Merchant Amount:</b> {{ $payment->mer_amount }}</p>
                        </div>
                        <div class="col-md-6 ">
                            <p><b>Eci value:</b> {{ $payment->eci_value }}</p>
                            <p><b>Retry:</b> {{ $payment->retry }}</p>
                            <p><b>Response code:</b> {{ $payment->response_code }}</p>
                            <p><b>Billing notes:</b> {{ $payment->billing_notes }}</p>
                            <p><b>Transaction date:</b> {{ $payment->trans_date }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
