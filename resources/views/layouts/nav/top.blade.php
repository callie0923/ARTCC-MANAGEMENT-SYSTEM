<nav class="navbar px-navbar">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ route('index') }}">
            @if(file_exists(public_path('assets/images/logo.png')))
                <img src="/assets/images/logo.png" style="height: 48px">
            @else
                <b><i>PLEASE UPLOAD A LOGO IN SYSTEM ADMIN</i></b>
            @endif
        </a>
    </div>
</nav>