<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Result parse</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta content="Coderthemes" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('/assets/images/favicon.ico') }}">

    <!-- DataTables -->
    <link href="{{ asset('/plugins/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@yield('css')
<!-- App css -->
    <link href="{{ asset('/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/assets/css/core.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/assets/css/components.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/assets/css/icons.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/assets/css/pages.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/assets/css/menu.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/assets/css/responsive.css') }}" rel="stylesheet" type="text/css"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="">
<div id="wrapper">
    <div class="topbar">
        <div class="topbar-left">
            <a href="{{url('')}}" class="logo">
                <span class="text-success">Parser</span>
            </a>
        </div>
        <div class="navbar navbar-default" role="navigation">
            <div class="container">
                <ul class="nav navbar-nav navbar-left nav-menu-left">
                    <li>
                        <button type="button" class="button-menu-mobile open-left waves-effect">
                            <i class="dripicons-menu"></i>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="left side-menu">
        <div class="slimscroll-menu" id="remove-scroll">
            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metisMenu nav" id="side-menu">
                    <li class="menu-title">Навигация</li>
                    <li class="{{ Request::path() == '/'  ? 'active' : '' }}">
                        <a href="{{url('//')}}" aria-expanded="true">
                            <i class="fi-target"></i>
                            <span class="badge badge-success pull-right"></span>
                            <span> Result parse </span>
                        </a>
                    </li>

                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="content-page">
        @yield('content')
        <footer class="footer text-right"></footer>
    </div>
</div>
@yield('jQuery')
</body>
</html>