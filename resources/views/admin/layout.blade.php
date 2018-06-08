<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Поверка приборов</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset('/css/admin.css') }}">

    <style>
        table.table form
        {
            display: inline-block;
        }
        button.delete
        {
            background: transparent;
            border: none;
            color: #337ab7;
            padding: 0px;
        }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <div class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">ПП</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Поверка</b>Приборов</span>
        </div>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="hidden-xs">{{$active_user->name}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <p>
                                    {{$active_user->email}}
                                </p>
                            </li>
                            <!-- Menu Footer-->
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="treeview">
                    <a href="">
                        <i class="glyphicon glyphicon-th"></i>
                        <span>Главная</span>
                    </a>
                </li>
                <li class="header">Справочники</li>
                <li>
                    <a href="{{route('stamps.index')}}">
                        <i class="glyphicon glyphicon-lock"></i>
                        <span>Пломбы</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('devices.index')}}">
                        <i class="glyphicon glyphicon-th-list"></i>
                        <span>Поверки</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('devicetypes.index')}}">
                        <i class="glyphicon glyphicon-scale"></i>
                        <span>Приборы</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('consumers.index')}}">
                        <i class="glyphicon glyphicon-briefcase"></i>
                        <span>Предприятия</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('users.index')}}">
                        <i class="glyphicon glyphicon-user"></i>
                        <span>Кураторы</span>
                    </a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    @yield('content')
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; 2018.</strong>
    </footer>

</div>

<script src="{{ asset('/js/admin.js') }}"></script>
</body>
</html>
