@if(Auth::check() && Auth::user()->type_users == 'admin')
    @include('dashboard.admin')
@elseif(Auth::check() && Auth::user()->type_users == 'user')
    @include('dashboard.user')
@elseif(Auth::check() && Auth::user()->type_users == 'laboran')
    @include('dashboard.laboran')
@elseif(Auth::check()&& Auth::user()->type_users == 'teknisi')
    @include('dashboard.teknisi')
@elseif(Auth::check())
    <meta http-equiv="refresh" content="0; url={{ route('welcome') }}" />
@endif