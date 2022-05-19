<!-- Main sidebar -->
<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        Navigation
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->


    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="card-body">
                <div class="media">
                    <div class="mr-3">
                        <a href="#">
                            @if(Auth::user()->foto != null)
                                <img src="{{Storage::url(Auth::user()->foto??'')}}" width="38" height="38" class="rounded-circle" alt="">
                            @else
                                <img src="{{asset('global_assets/images/placeholders/placeholder.jpg')}}" width="38" height="38" class="rounded-circle" alt="">
                            @endif
                        </a>
                    </div>

                    <div class="media-body">
                        <div class="media-title font-weight-semibold">{{Auth::user()->name??''}}</div>
                        <div class="font-size-xs opacity-50">
                            <i class="icon-pin font-size-sm"></i> &nbsp;
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
                <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>

                @role('administrator')
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-copy"></i> <span>Master</span></a>

                    <ul class="nav nav-group-sub" data-submenu-title="Master">
                        <li class="nav-item">
                            <a href="{{route('users.index')}}" class="nav-link active">Member</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('json')}}" class="nav-link active">Member Json</a>
                        </li>
                    </ul>
                </li>
                @endrole
                @role('anggota')
                <li class="nav-item">
                    <a href="#" class="nav-link"><i class="icon-book2"></i> <span>Data Anggota</span></a>
                </li>
                @endrole



                <li class="nav-item  d-sm-block d-md-block d-lg-none">
                {!! Form::open(['route' => 'logout','files' => true, 'id' => 'form-','method' => 'post'])!!}
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-danger btn-block">
                    <i class="fa fa-power-off"></i> Logout
                </button>
                {!! Form::close()  !!}
                </li>

                <!-- /page kits -->

            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>
<!-- /main sidebar -->
