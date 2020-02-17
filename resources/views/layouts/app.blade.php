<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Canvas Print</title>
    <!-- Favicon-->
    <link rel="icon" href="{{URL::asset('favicon.png')}}" type="image/x-icon">

    @include('includes.styleSRC')
    @include('includes.javascripts')
</head>

<body class="theme-red " >
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait</p>
        </div>
    </div>
    <!-- #END# Page Loader -->

    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">Search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->

    <!-- Top Bar -->
        @include('includes.header')
    <!-- #Top Bar -->

    <section>
        <!-- Left Sidebar -->
        @include('includes.sidebar')
        <!-- #END# Left Sidebar -->

        <!-- Right Sidebar -->
        @include('includes.right_sidebar')
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div id="errorAlertMessage"></div>
        </div>
        @yield('content')
    </section>
</body>

</html>
