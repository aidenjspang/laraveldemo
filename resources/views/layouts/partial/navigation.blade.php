<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ auth()->check() ? route('root') : route('root') }}">
                <!-- JCL BOOKING  -->
                <img src="{{ URL::asset('images/jclimousines_logo.png') }}">
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <!--
                &nbsp;<li {!! str_contains(request()->path(), ['tags', 'articles']) ? 'class="active"' : '' !!}>
                    <a href="{{ route('articles.index') }}">
                        Articles
                    </a>
                </li>
                -->
                &nbsp;<li>
                    <a href="{{ route('bookings.index') }}">
                        BOOKINGS
                    </a>
                </li>
                &nbsp;<li>
                    <a href="{{ route('bookings.create') }}">
                        <i class="fa fa-plus-circle"></i> NEW BOOKING
                    </a>
                </li>
                &nbsp;<li>
                    <a href="{{ route('emails.index') }}">
                        EMAIL LOG
                    </a>
                </li>
                &nbsp;<li>
                    <a href="{{ route('suppliers.index') }}">
                        SUPPLIER
                    </a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li>
                        <a href="{{ route('sessions.create', ['return' => urlencode($currentUrl)]) }}">
                            {{ trans('auth.sessions.title') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('users.create', ['return' => urlencode($currentUrl)]) }}">
                            {{ trans('auth.users.title') }}
                        </a>
                    </li>
                @else
                    <li style="padding: 1.25em;width: 280px;">
                        <aside>
                            @include('bookings.partial.search')
                        </aside>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('sessions.destroy') }}">
                                    {{ trans('auth.sessions.destroy') }}
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>