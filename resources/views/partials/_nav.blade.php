<nav class= "nav1 navbar navbar-fixed-top ">
    <div class="navbar-header">
        <a class="navbar-brand" href="/"> <img src="/images/aafoundationlogo(1).jpg" height="50px"></a>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="sr-only">Toggle navigation</span>
            <span style="background-color: cadetblue" class="icon-bar"></span>
            <span style="background-color: cadetblue" class="icon-bar"></span>
            <span  style="background-color: cadetblue" class="icon-bar"></span>
        </button>    
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav" id="activity">
            <!-- <li class="{{Request::path() == '/' ? 'active' : ''}}"><a href="/">Home</a></li> -->
            <li class="{{Request::path() == 'education' ? 'active' : ''}}"><a href="{{url('education')}}">Education</a></li>
            <li class="{{Request::path() == 'projects' ? 'active' : ''}}"><a href="{{url('projects')}}">Projects</a></li>
            <li class="{{Request::path() == 'events' ? 'active' : ''}}"><a href="{{url('events')}}">Events</a></li>
            <li class="{{Request::path() == 'select'? 'active' : Request::path() == 'donates/create'?'active':Request::path() == 'recipte'? 'active': ''}}"><a href="{{url('/select')}}" >Donate</a></li>
            @if (!Auth::check())
                <li class="{{Request::path() == 'register' ? 'active' : ''}}"><a href="{{url('/register')}}">Sign Up</a></li>
                <li class="{{Request::path() == 'login' ? 'active' : ''}}"><a href="{{url('/login')}}" >Login</a></li>
            @else
                <li class="dropdown profile">

                    <a href="#" class="dropdown-toggle" id="userp" data-toggle="dropdown" role="button" aria-expanded="false" style="padding-top: 9px; padding-bottom: 9px;">
                        <img src="images/avatars/{{Auth::user()->avatar}}" class="avatar img-circle">

                        {{ Auth::user()->firstname }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu" id="dropdown-menu">
                        <div class="callout-arrow"></div>
                        <div class="topbar"></div>
                        <li>
                            <a href ="{{url('/userprofile')}}">Profile</a>
                        </li>
                        @if (Auth::user()->isAdmin)
                        <li>
                            <a href ="{{url('/admin')}}">Admin Panel</a>
                        </li>
                        @endif
                        @if(Auth::check())
                            <li>
                                <a href ="{{url('/')}}">History</a>
                            </li>
                        @endif
                        <li>
                            <a href="{{ url('/logout') }}"
                               onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </div>
</nav>
