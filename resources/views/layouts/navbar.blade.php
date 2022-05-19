<div class="navbar navbar-expand-md navbar-dark">
    <div class="navbar-brand">
        <a href="/" class="d-inline-block">
            <img src="{{asset('global_assets/images/logo_light.png')}}" alt="">
        </a>
    </div>

    <div class="d-md-none">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-tree5"></i>
        </button>
        <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
            <i class="icon-paragraph-justify3"></i>
        </button>
        <button class="navbar-toggler sidebar-mobile-secondary-toggle" type="button">
            <i class="icon-more"></i>
        </button>
    </div>

    <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                    <i class="icon-paragraph-justify3"></i>
                </a>
            </li>


        </ul>

        <span class="navbar-text ml-md-3 mr-md-auto">

			</span>

        <ul class="navbar-nav">

            <li class="nav-item dropdown dropdown-user">
                <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
                    @if(Auth::user()->foto != null)
                        <img src="{{Storage::url(Auth::user()->foto??'')}}" width="38" height="38" class="rounded-circle" alt="">
                    @else
                        <img src="{{asset('global_assets/images/placeholders/placeholder.jpg')}}" width="38" height="38" class="rounded-circle" alt="">
                    @endif
                        <span>{{Auth::user()->name??''}}</span>
                </a>
                @if(Auth::user() != null)
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="{{route('profile.edit',[Auth::user()->id??''])}}" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>

                    {!! Form::open(['route' => 'logout','files' => true, 'id' => 'form-','method' => 'post'])!!}
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-danger btn-block">
                        <i class="fa fa-power-off"></i> Logout
                    </button>
                    {!! Form::close()  !!}
                </div>
                @endif
            </li>
        </ul>
    </div>
</div>
