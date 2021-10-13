@permission('manage-access')
<li>
    <a href="#">
        <i class="fa fa-users"></i>
        <span>{{ trans('menus.backend.access.title') }}</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>

    <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/access/*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/access/*'), 'display: block;') }}">
        <li class="{{ active_class(Active::checkUriPattern('admin/access/user*')) }}">
            <a href="{{ route('admin.access.user.index') }}">
                <i class="fa fa-circle-o"></i>
                <span>{{ trans('labels.backend.access.users.management') }}</span>
            </a>
        </li>

        <li class="{{ active_class(Active::checkUriPattern('admin/access/role*')) }}">
            <a href="{{ route('admin.access.role.index') }}">
                <i class="fa fa-circle-o"></i>
                <span>{{ trans('labels.backend.access.roles.management') }}</span>
            </a>
        </li>
    </ul>
</li>
@endauth

<li class="{{ Request::is('dashboard*') ? 'active' : '' }}">
    <a href="{!! route('admin.home') !!}"><i class="fa fa-edit"></i><span>Dashboard</span></a>
</li>

@permission('manage-merchants')
<li class="{{ Request::is('merchants*') ? 'active' : '' }}">
    <a href="{!! route('admin.merchants.index') !!}"><i class="fa fa-edit"></i><span>Merchants</span></a>
</li>
@endauth

@permission('manage-services')
<li class="{{ Request::is('services*') ? 'active' : '' }}">
    <a href="{!! route('admin.services.index') !!}"><i class="fa fa-edit"></i><span>Services</span></a>
</li>
@endauth

@permission('manage-tokens')
<li class="{{ Request::is('tokens*') ? 'active' : '' }}">
    <a href="{!! route('admin.tokens.index') !!}"><i class="fa fa-key"></i><span>Tokens</span></a>
</li>
@endauth

@permission('manage-otp-request')
<li class="{{ Request::is('otp-request*') ? 'active' : '' }}">
    <a href="{!! route('admin.otp.request') !!}"><i class="fa fa-list-alt"></i><span>Data Logs</span></a>
</li>
<li class="{{ Request::is('otp-request*') ? 'active' : '' }}">
    <a href="{!! route('admin.top.up.request') !!}"><i class="fa fa-list-alt"></i><span>Top Up Logs</span></a>
</li>
@endauth

@client('manage-orders')
<li class="{{ Request::is('otp-request*') ? 'active' : '' }}">
    <a href="{!! route('admin.otp.request.client') !!}"><i class="fa fa-list-alt"></i><span>Data Logs</span></a>
</li>
<li class="{{ Request::is('order*') ? 'active' : '' }}">
    <a href="{!! route('admin.top.up.request.client') !!}"><i class="fa fa-edit"></i><span>Top Up Logs</span></a>
</li>
@endauth

