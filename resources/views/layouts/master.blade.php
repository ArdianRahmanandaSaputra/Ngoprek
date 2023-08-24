<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{config('app.name')}} | @yield('title') </title>
    <link rel="shortcut icon" href="{{ asset('adminAsset/img/favicon.ico') }}">
    <!--STYLESHEET-->
    <!--=================================================-->
    <!--Roboto Slab Font [ OPTIONAL ] -->
    <link href="http://fonts.googleapis.com/css?family=Roboto+Slab:400,300,100,700" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Roboto:500,400italic,100,700italic,300,700,500italic,400"
        rel="stylesheet">
    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="{{ asset('adminAsset/css/bootstrap.min.css') }}" rel="stylesheet">
    <!--Jasmine Stylesheet [ REQUIRED ]-->
    <link href="{{ asset('adminAsset/css/style.css') }}" rel="stylesheet">
    <!--Font Awesome [ OPTIONAL ]-->
    <link href="{{ asset('adminAsset/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!--Switchery [ OPTIONAL ]-->
    <link href="{{ asset('adminAsset/plugins/switchery/switchery.min.css') }}" rel="stylesheet">
    <!--Bootstrap Select [ OPTIONAL ]-->
    <link href="{{ asset('adminAsset/plugins/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet">
    <!--Bootstrap Validator [ OPTIONAL ]-->
    <link href="{{ asset('adminAsset/plugins/bootstrap-validator/bootstrapValidator.min.css') }}" rel="stylesheet">
    <!--Demo [ DEMONSTRATION ]-->
    <link href="{{ asset('adminAsset/css/demo/jquery-steps.min.css') }}" rel="stylesheet">
    <!--Demo [ DEMONSTRATION ]-->
    <link href="{{ asset('adminAsset/css/demo/jasmine.css') }}" rel="stylesheet">
    <!--SCRIPT-->
    <!--=================================================-->
    <!--Page Load Progress Bar [ OPTIONAL ]-->
    <link href="{{ asset('adminAsset/css/demo/jasmine.css') }}" rel="stylesheet">
    <script src="{{ asset('adminAsset/plugins/pace/pace.min.js') }}"></script>
    <!--Data Table-->
    <link href="https://cdn.datatables.net/v/ju/dt-1.13.4/datatables.min.css" rel="stylesheet" />
</head>

<body>
    <div id="container" class="effect mainnav-lg navbar-fixed mainnav-fixed">

        @includeIf('layouts.header')

        <div class="boxed">
            <div id="content-container">

                <div class="pageheader">
                    @yield('main-header')
                </div>


                <div id="page-content">
                    @include('layouts.alert')
                    @yield('main-content')
                </div>
            </div>

            @includeIf('layouts.sidebar')
        </div>

        @includeIf('layouts.footer')

        <button id="scroll-top" class="btn"><i class="fa fa-chevron-up"></i></button>
    </div>

    <!--JAVASCRIPT-->
    <!--=================================================-->
    <!--jQuery [ REQUIRED ]-->
    <script src="{{ asset('adminAsset/js/jquery-2.1.1.min.js') }}"></script>
    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="{{ asset('adminAsset/js/bootstrap.min.js') }}"></script>
    <!--Fast Click [ OPTIONAL ]-->
    <script src="{{ asset('adminAsset/plugins/fast-click/fastclick.min.js') }}"></script>
    <!--Jasmine Admin [ RECOMMENDED ]-->
    <script src="{{ asset('adminAsset/js/scripts.js') }}"></script>
    <!--Switchery [ OPTIONAL ]-->
    <script src="{{ asset('adminAsset/plugins/switchery/switchery.min.js') }}"></script>
    <!--Jquery Steps [ OPTIONAL ]-->
    <script src="{{ asset('adminAsset/plugins/parsley/parsley.min.js') }}"></script>
    <!--Jquery Steps [ OPTIONAL ]-->
    <script src="{{ asset('adminAsset/plugins/jquery-steps/jquery-steps.min.js') }}"></script>
    <!--Bootstrap Select [ OPTIONAL ]-->
    <script src="{{ asset('adminAsset/plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <!--Bootstrap Wizard [ OPTIONAL ]-->
    <script src="{{ asset('adminAsset/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}"></script>
    <!--Fullscreen jQuery [ OPTIONAL ]-->
    <script src="{{ asset('adminAsset/plugins/easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
    <!--Form Wizard [ SAMPLE ]-->
    <script src="{{ asset('adminAsset/js/demo/index.js') }}"></script>
    <!--Demo script [ DEMONSTRATION ]-->
    <script src="{{ asset('adminAsset/js/demo/jasmine.js') }}"></script>
    <!--Form Wizard [ SAMPLE ]-->
    <script src="{{ asset('adminAsset/js/demo/form-wizard.js') }}"></script>
    <script src="https://cdn.datatables.net/v/ju/dt-1.13.4/datatables.min.js"></script>
    @yield('script')
</body>

</html>
