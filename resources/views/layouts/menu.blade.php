<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{{ route('users.index') }}"><i class="fa fa-users"></i><span>Users</span></a>
</li>
<li class="nav-item {{ Request::is('roles*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! url('roles') !!}">
        <i class="fa fa-user nav-icon" aria-hidden="true"></i>&nbsp;&nbsp;Roles
    </a>
</li>

