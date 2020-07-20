<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin</title>
    {{--script--}}

    <!-- Bootstrap Core CSS -->



    <link href="{{asset('css/libs.css')}}" rel="stylesheet">

    <link href="{{mix('css/app.css')}}" rel="stylesheet">


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('styles')
</head>
<body id="admin-page" class="">
<div id="wrapper">

<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <!-- Navigation -->
    <!---Top Nav---->
    @include('includes.top_nav')
    <!---Top Nav---->

    <!----Side Nav---->
    @include('includes.admin_side_nav')
    <!----Side Nav---->
</nav>

    <!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"></h1>
                @yield('content')
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->



</div>
<!-- /#wrapper -->




<script src="{{ mix('js/app.js') }}" defer></script>
<script src="{{asset('js/libs.js')}}"></script>
@yield('scripts')

</body>
</html>