         <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/home') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                         @if (!Sentinel::guest())
                       <li class="navbar-item"><a class="nav-link" href="{{ route('home') }}"> Home </a></li>
                       <li class="navbar-item"><a class="nav-link" href="{{ route('posts.index') }}"> posts </a></li> 
                        @else
                            &nbsp;
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Sentinel::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else                        
                            <li class="dropdown">                               
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    <img src="/profile_pictures/{{ Sentinel::getUser()->profile_picture }}" class="img-circle avatar" alt="User Profile Image" style="    height: 30px;object-fit: cover; max-width: 30px; margin-right: 2px">
                                    {{ Sentinel::getUser()->first_name }} 
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        @if (Sentinel::getUser()->hasAnyAccess(['admin.*','moderator.*']))
                                        <a href="{{ route('admin.dashboard') }}" > Dashboard </a>
                                        @endif
                                    </li>
                                    <li>
                                        @if (Sentinel::getUser()->hasAnyAccess(['user.*']))
                                        <a href="{{ route('user.dashboard') }}" > Dashboard </a>
                                        @endif
                                    </li>
                                    <li>
                                        @if (Sentinel::getUser()->hasAnyAccess(['*.create']))
                                        <a href="{{ route('posts.create') }}" > Create A Post </a>
                                        @endif
                                    </li>
                                    <li>
                                        @if (Sentinel::getUser()->hasAnyAccess(['*.approve']))
                                        <a href="{{ route('posts.unapproved') }}" > unapproved posts list</a>
                                        @endif
                                        
                                    </li>
                                    <li>
                                        <a href="{{ route('myProfile') }}" > Update Profile </a>

                                        
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>