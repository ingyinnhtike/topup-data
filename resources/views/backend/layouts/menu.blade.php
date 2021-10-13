<li class="{{ Request::is('customers*') ? 'active' : '' }}">
    <a href="{!! route('admin.customers.index') !!}"><i class="fa fa-edit"></i><span>Customers</span></a>
</li>

<li class="{{ Request::is('merchants*') ? 'active' : '' }}">
    <a href="{!! route('admin.merchants.index') !!}"><i class="fa fa-edit"></i><span>Merchants</span></a>
</li>

