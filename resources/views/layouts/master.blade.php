<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="_token" content="{!! csrf_token() !!}"/>

    @if($pageTitle)
        <title>vZJX | {{ $pageTitle }}</title>
    @else
        <title>vZJX</title>
    @endif

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&subset=latin" rel="stylesheet" type="text/css">
    <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css">

    <!-- Core stylesheets -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/pixeladmin.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/widgets.min.css" rel="stylesheet" type="text/css">

    <script src="https://use.fontawesome.com/dd15402ec0.js"></script>

    <!-- Theme -->
    <link href="/assets/css/themes/clean.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/master.css" rel="stylesheet" type="text/css">

    <script src="/assets/pace/pace.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/pixeladmin.min.js"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });
    </script>

</head>
<body>
<!-- Nav -->
@include('layouts.nav.left')

<!-- Navbar -->
@include('layouts.nav.top')

<!-- Content -->
<div class="px-content">

    @include('layouts.breadcrumbs')

    <div class="page-header">
        <h1>{{ $pageTitle or 'ZJX ARTCC' }}</h1>
    </div>

    @include('layouts.alert')


    <div class="row">
        <div class="col-sm-12">
            @yield('content')
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="px-footer px-footer-bottom">
    Copyright © {{ date('Y') }} Virtual Jacksonville ARTCC.
</footer>

<!-- Your scripts -->
<script>
    $(document).ready(function() {
        $('.px-nav').pxNav('expand');
        setTimeout(function() {
            $('.alertrow').fadeOut("fast");
        }, 5000);
    });

</script>


</body>
</html>
