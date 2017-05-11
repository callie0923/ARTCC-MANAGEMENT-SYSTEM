<nav class="px-nav px-nav-left">
    <button type="button" class="px-nav-toggle" data-toggle="px-nav">
        <span class="px-nav-toggle-arrow"></span>
        <span class="navbar-toggle-icon"></span>
        <span class="px-nav-toggle-label font-size-11">HIDE MENU</span>
    </button>

    <ul class="px-nav-content">
        @if(Auth::check())
            <li class="px-nav-box p-a-3 b-b-1" id="demo-px-nav-box">
                <div class="font-size-16"><span class="font-weight-light">Welcome, </span><strong>{{ Auth::user()->first_name }}</strong></div>
                <div class="btn-group" style="margin-top: 4px;">
                    <a href="#" class="btn btn-xs btn-primary btn-outline"><i class="fa fa-user"></i></a>
                    <a href="{{ route('auth.logout') }}" class="btn btn-xs btn-danger btn-outline"><i class="fa fa-power-off"></i></a>
                </div>
            </li>
        @else
            <li class="px-nav-item">
                <a href="{{ route('auth.login') }}"><i class="px-nav-icon fa fa-lock"></i><span class="px-nav-label">Login</span></a>
            </li>
        @endif

        <li class="px-nav-item">
            <a href="{{ route('index') }}"><i class="px-nav-icon ion-ios-pulse-strong"></i><span class="px-nav-label">Dashboard</span></a>
        </li>
        <li class="px-nav-item px-nav-dropdown {{ active('pilots.*', 'px-open') }}">
            <a href="#"><i class="px-nav-icon fa fa-plane"></i><span class="px-nav-label">Pilots</span></a>
            <ul class="px-nav-dropdown-menu">
                <li class="px-nav-item"><a href="#"><span class="px-nav-label">Charts</span></a></li>
                <li class="px-nav-item"><a href="#"><span class="px-nav-label">ZJX Airports</span></a></li>
                <li class="px-nav-item"><a href="#"><span class="px-nav-label">Weather</span></a></li>
                <li class="px-nav-item {{ active('pilots.routes.index', 'px-nav-active') }}"><a href="{{ route('pilots.routes.index') }}"><span class="px-nav-label">Route Finder</span></a></li>
            </ul>
        </li>
        <li class="px-nav-item px-nav-dropdown">
            <a href="#"><i class="px-nav-icon fa fa-users"></i><span class="px-nav-label">ARTCC</span></a>
            <ul class="px-nav-dropdown-menu">
                <li class="px-nav-item"><a href="#"><span class="px-nav-label">Management</span></a></li>
                <li class="px-nav-item"><a href="#"><span class="px-nav-label">Roster</span></a></li>
                <li class="px-nav-item"><a href="#"><span class="px-nav-label">Documents & Files</span></a></li>
                <li class="px-nav-item"><a href="#"><span class="px-nav-label">Controller Stats</span></a></li>
            </ul>
        </li>
        <li class="px-nav-item">
            <a href="#"><i class="px-nav-icon fa fa-comment"></i><span class="px-nav-label">Feedback</span></a>
        </li>
        @if(Auth::check())
        <li class="px-nav-item">
            <a href="#"><i class="px-nav-icon fa fa-forumbee"></i><span class="px-nav-label">Forum</span></a>
        </li>
        <li class="px-nav-item">
            <a href="#"><i class="px-nav-icon fa fa-microchip"></i><span class="px-nav-label">IDS</span></a>
        </li>
        <li class="px-nav-item px-nav-dropdown">
            <a href="#"><i class="px-nav-icon fa fa-pencil"></i><span class="px-nav-label">Training</span></a>
            <ul class="px-nav-dropdown-menu">
                <li class="px-nav-item"><a href="#"><span class="px-nav-label">View Availability</span></a></li>
                <li class="px-nav-item"><a href="#"><span class="px-nav-label">Session History</span></a></li>
                <li class="px-nav-item"><a href="#"><span class="px-nav-label">Book Session</span></a></li>
            </ul>
        </li>
        <li class="px-nav-item px-nav-dropdown">
            <a href="#"><i class="px-nav-icon fa fa-lock"></i><span class="px-nav-label">ZJX Administration</span></a>
            <ul class="px-nav-dropdown-menu">
                <li class="px-nav-item"><a href="#"><span class="px-nav-label">Roster</span></a></li>
                <li class="px-nav-item"><a href="#"><span class="px-nav-label">Events</span></a></li>
                <li class="px-nav-item"><a href="#"><span class="px-nav-label">Documents & Files</span></a></li>
                <li class="px-nav-item px-nav-dropdown">
                    <a href="#"><span class="px-nav-label">Other Administration</span></a>
                    <ul class="px-nav-dropdown-menu">
                        <li class="px-nav-item"><a href="#"><span class="px-nav-label">Broadcast Email</span></a></li>
                        <li class="px-nav-item"><a href="#"><span class="px-nav-label">Site Activity</span></a></li>
                        <li class="px-nav-item"><a href="#"><span class="px-nav-label">Feedback</span></a></li>
                        <li class="px-nav-item"><a href="#"><span class="px-nav-label">Index Announcements</span></a></li>
                    </ul>
                </li>
            </ul>
        </li>
        @endif
    </ul>
</nav>