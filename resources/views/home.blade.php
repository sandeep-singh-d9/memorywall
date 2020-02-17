@extends('layouts.app') @section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>Dashboard</h2>
    </div>
    <!-- Widgets -->
    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-light-green hover-expand-effect">
                <div class="icon">
                    <i class="material-icons-outlined">perm_identity</i>
                </div>
                <div class="content">
                    <div class="text">User</div>
                    <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20">
                        {{ $user }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-pink hover-expand-effect">
                <div class="icon">
                    <i class="material-icons-outlined">ballot</i>
                </div>
                <div class="content">
                    <div class="text">Order</div>
                    <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20">
                        {{ $order }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-cyan hover-expand-effect">
                <div class="icon">
                    <i class="material-icons-outlined">ballot</i>
                </div>
                <div class="content">
                    <div class="text">Complete</div>
                    <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">
                        {{ $complete }}
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- #END# Widgets -->
</div>
@endsection
