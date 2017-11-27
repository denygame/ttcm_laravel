<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <base href="{{asset('')}}">
    <link rel="stylesheet" href="source/admin/css/bootstrap.min.css" />
    <link rel="stylesheet" href="source/admin/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="source/admin/css/uniform.css" />
    <link rel="stylesheet" href="source/admin/css/select2.css" />
    <link rel="stylesheet" href="source/admin/css/matrix-style.css" />
    <link rel="stylesheet" href="source/admin/css/matrix-media.css" />
    <link href="source/admin/font-awesome/css/font-awesome.css" rel="stylesheet" />
    {{-- <link rel="stylesheet" href="source/admin/css/jquery.gritter.css" /> --}}
</head>
<body>

    <!--Header-part-->
    <div id="header">
        <h1><a href="dashboard.html">T2HD books</a></h1>
    </div>
    <!--close-Header-part-->


    <!--top-Header-menu-->
    <div id="user-nav" class="navbar navbar-inverse">
        <ul class="nav">
            <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  
                <span class="text">
                    @php
                    echo Auth::guard('admin')->check()?'Xin chào '.Auth::guard('admin')->user()->name:'';
                    @endphp    
                </span><b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a><i class="icon-user"></i> Thông tin cá nhân</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ route('adminlogout') }}"><i class="icon-key"></i> Đăng xuất</a></li>
                </ul>
            </li>
            <li class=""><a title="" href="{{ route('adminlogout') }}"><i class="icon icon-share-alt"></i> <span class="text">Đăng xuất</span></a></li>
        </ul>
    </div>
    <!--close-top-Header-menu-->
    <!--start-top-serch-->
    <div id="search">
        <input type="text" placeholder="Search here..."/>
        <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
    </div>
    <!--close-top-serch-->

    <!--sidebar-menu-->
    <div id="sidebar">
        @yield('menu')    
        {{-- <ul>
            <li class="active"><a href="{{ route('managegeneral') }}"><i class="icon icon-cog"></i> <span>Quản lý chung</span></a></li>
            <li><a href="{{ route('managebook') }}"><i class="icon icon-book"></i> <span>Quản lý sách</span></a> </li>
            <li><a href="{{ route('managecate') }}"><i class="icon icon-list"></i> <span>Quản lý danh mục</span></a> </li>
            <li ><a href="{{ route('manageacc') }}"><i class="icon icon-user"></i> <span>Quản lý tài khoản</span></a></li>

            <li class="submenu"><a href="manage-warehouse.html"><i class="icon icon-tasks"></i> <span>Quản lý kho sách</span></a>
                <ul>
                    <li><a href="manage-warehouse.html">Kho sách</a></li>
                    <li><a href="warehouse-history.html">Lịch sử</a></li>
                </ul>
            </li>

            <li><a href="{{ route('managebill') }}"><i class="icon icon-money"></i> <span>Quản lý hóa đơn</span></a></li>
        </ul> --}}
    </div>
    <!--sidebar-menu-->





    <!--main-container-part-->
    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            @yield('content-header')
        </div>
        <!--End-breadcrumbs-->

        <div class="container-fluid">
            @yield('content')
        </div>
    </div>

    <!--end-main-container-part-->



    <!--Footer-part-->
    <div class="row-fluid">
        <div id="footer" class="span12"> 2017 &copy; Thực tập chuyên môn - Admin <a href="{{ route('home') }}">T2HD_Bookstore</a> </div>
    </div>

    <!--end-Footer-part-->

    <script src="source/admin/js/jquery.min.js"></script>
    <script src="source/admin/js/jquery.ui.custom.js"></script>
    <script src="source/admin/js/bootstrap.min.js"></script>
    <script src="source/admin/js/jquery.uniform.js"></script>
    <script src="source/admin/js/select2.min.js"></script>
    <script src="source/admin/js/jquery.dataTables.min.js"></script>
    <script src="source/admin/js/matrix.js"></script>
    <script src="source/admin/js/matrix.tables.js"></script>
    <script src="source/admin/js/excanvas.min.js"></script>
    {{-- <script src="source/admin/js/jquery.flot.min.js"></script> --}}
    {{-- <script src="source/admin/js/jquery.flot.resize.min.js"></script> --}}
    <script src="source/admin/js/jquery.peity.min.js"></script>
    <script src="source/admin/js/fullcalendar.min.js"></script>
    {{-- <script src="source/admin/js/matrix.dashboard.js"></script> --}}
    <script src="source/admin/js/jquery.gritter.min.js"></script>
    <script src="source/admin/js/matrix.interface.js"></script>
    <script src="source/admin/js/matrix.chat.js"></script>
    <script src="source/admin/js/jquery.validate.js"></script>
    <script src="source/admin/js/matrix.form_validation.js"></script>
    <script src="source/admin/js/jquery.wizard.js"></script>
    <script src="source/admin/js/matrix.popover.js"></script>
    <script src="source/admin/js/backend/myscript.js"></script>

    <script type="text/javascript">
    // This function is called from the pop-up menus to transfer to
    // a different page. Ignore if the value returned is a null string:
    function goPage (newURL) {

        // if url is empty, skip the menu dividers and reset the menu selection to default
        if (newURL != "") {

            // if url is "-", it is this page -- reset the menu:
            if (newURL == "-" ) {
                resetMenu();
            }
            // else, send page to designated URL
            else {
                document.location.href = newURL;
            }
        }
    }

    // resets the menu selection upon entry to this page:
    function resetMenu() {
        document.gomenu.selector.selectedIndex = 2;
    }
</script>
</body>
</html>
