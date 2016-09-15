
<nav class="navbar navbar-inverse">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Charity Foundation</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav pull-right">
                <li class="active"><a href="/">Home</a></li>
                <li><a href="{{url('aboutus')}}">About Us</a></li>
                <li><a href="{{url('projects')}}">Projects</a></li>
                <li><a href="{{url('events')}}">Events</a></li>
                <li><a href="{{url('contact')}}">Contact Us</a></li>
                <li><a href="{{url('/select')}}" >Donate</a></li>
                @if (Auth::guest())
                    <li><a href={{url('/register')}}>Sign Up</a></li>
                    <li><a href="{{url('/login')}}" >Login</a></li>
                @else

                    <li class="dropdown">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative; padding-left:50px;">
                            <img src="/avatars/{{Auth::user()->avatar}}" style="width:32px; height:32px; position:absolute; top:10px; left:10px; border-radius:50%">
                            {{ Auth::user()->lastname }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
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
                            <li>
                                <a href ="{{url('/userprofile')}}">Profile</a>

                            </li>

                        </ul>

                    </li>
                @endif



            </ul>
        </div>

</nav>
