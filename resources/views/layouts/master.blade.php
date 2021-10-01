<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>@yield('title')</title>
    <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
    <meta content="Themesdesign" name="author" />
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="{{ asset('assets/morris/morris.css') }}">

    <link href="{{ asset('assets/css1/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css1/metismenu.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css1/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css1/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/morris/morris.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ asset('assets/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet"/>

    @hasrole('caller')
    <style>
        .content-page {
            margin-left: 0px;
        }
        .footer {
            left: 100px;
        }
    </style>
    @endhasrole
</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <div class="topbar">

            <!-- LOGO -->
            <div class="topbar-left">
                <a href="{{ url('/phone_book') }}" class="logo">
                    <span class="logo-light">
                        <i class="mdi mdi-camera-control"></i> FlyAmaze
                    </span>
                    <span class="logo-sm">
                        <i class="mdi mdi-camera-control"></i>
                    </span>
                </a>
            </div>

            <nav class="navbar-custom">
                <ul class="navbar-right list-inline float-right mb-0">
                    <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                       {{ Auth::user()->email }}
                        <a class="nav-link waves-effect"
                        href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                           &nbsp;
                            <i class=" fas fa-power-off fa-1x text-danger"></i>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>



            </nav>

        </div>
        <!-- ========== Left Sidebar Start ========== -->
        @hasanyrole('admin|Manager')
        <div class="left side-menu">
            <div class="slimscroll-menu" id="remove-scroll">
        
                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu" id="side-menu">
                        <li class="menu-title">Menu</li>
                        <li>
                            <a href="/" class="waves-effect">
                                <i class="icon-accelerator"></i><span> Dashboard </span>
                            </a>
                        </li>
                        @hasrole('admin')
                        <li>
                            <a href="javascript:void(0);" class="waves-effect"><i class="icon-profile-add"></i><span> User Management <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                            <ul class="submenu">
                                <li><a href="/users">Users</a></li>
                                <li><a href="/roles">Roles</a></li>
                                <li><a href="/permissions">Permissions</a></li>
                                {{-- <li><a href="/vendors">View Employees</a></li> --}}
                                {{-- <li><a href="email-compose.html">Update Vendor</a></li> --}}
                            </ul>
                        </li>
                        @endhasrole
                       @hasanyrole('Manager|admin')

                       <li>
                        <a href="javascript:void(0);" class="waves-effect"><i class="icon-squares"></i><span> Phone Book <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                        <ul class="submenu">
                            <li><a href="{{ url('phonebook_form',['id'=>0]) }}">New Contact</a></li>
                            <li><a href="/phone_book">View Contacts</a></li>
                            <li><a href="/contacts/assigned_contact">View Assigned Contacts</a></li>
                            <li><a href="/contacts/unassigned_contact">View UnAssigned Contacts</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0);" class="waves-effect"><i class="icon-three-stripes-horiz"></i><span> Leads <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                        <ul class="submenu">
                            <li><a href="{{ url('/lead') }}">View Leads</a></li>
                            <li><a href="{{ url('/plots') }}">Pending Leads</a></li>
                            <li><a href="{{ url('/purchased_plots') }}">Completed Leads</a></li>
                            <li><a href="{{ url('/sold_plots') }}">In Process Leads</a></li>
                            
                        </ul>
                    </li>

                       @endhasanyrole
    
                       @hasrole('admin')
                       <li>
                        <a href="javascript:void(0);" class="waves-effect"><i class="icon-paper-sheet"></i><span> Services <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                        <ul class="submenu">
                            <li><a href="{{ url('/visa') }}">View Visa</a></li>
                            <li><a href="{{ url('/create_visa',['id'=>0]) }}">Create Visa</a></li>
                            <li><a href="{{ url('/create_transport',['id'=>0]) }}">Create Transport</a></li>
                            <li><a href="{{ url('/transport') }}">View Transports</a></li>
                            <li><a href="{{ url('/create_hotel',['id'=>0]) }}">Create Hotel</a></li>
                            <li><a href="{{ url('/hotel') }}">View Hotels</a></li>
                            
                        </ul>
                    </li>     
                        @endhasrole
                          
                    </ul>
        
                </div>
                <!-- Sidebar -->
                <div class="clearfix"></div>
        
            </div>
            <!-- Sidebar -left -->
        
        </div>
        @endhasanyrole
        <!-- Left Sidebar End -->


        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <div class="row align-items-center">
                            <div class="col-sm-12">
                                <h4 class="page-title">@yield('headername')</h4>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end page-title -->
                    @yield('content')
                </div>
               

            </div>

                   

            <footer class="footer">
                <span class="d-none d-sm-inline-block"> Crafted with <i class="mdi mdi-heart text-danger"></i> MS Minds</span>.
            </footer>

        </div>
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- jQuery  -->
    <script src="{{ asset('assets/js1/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js1/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js1/metismenu.min.js') }}"></script>
    <script src="{{ asset('assets/js1/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('assets/js1/waves.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/pages1/datatables.init.') }}js"></script>
    <script src="{{ asset('assets/morris/morris.min.js') }}"></script>
    <script src="{{ asset('assets/raphael1/raphael.min.js') }}"></script>
    <script src="{{ asset('assets/pages1/dashboard.init.js') }}"></script>
    <script src="{{ asset('assets/js1/app.js') }}"></script>
    @yield('scripts')

</body>

</html>