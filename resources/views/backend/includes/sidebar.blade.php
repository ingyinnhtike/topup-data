<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel (optional) -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('menus.backend.sidebar.general') }}</li>

            <li class="{{ active_class(Active::checkUriPattern('admin/dashboard')) }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-dashboard"></i>
                    <span>{{ trans('menus.backend.sidebar.dashboard') }}</span>
                </a>
            </li>

            @permission('manage-packages')
            <li class="{{ active_class(Active::checkUriPattern('admin/package*')) }}">
                <a href="{{ route('admin.package.index') }}">
                    <i class="fa fa-shopping-cart"></i>
                    <span>{{ trans('menus.backend.sidebar.package') }}</span>
                </a>
            </li>
            @endauth

            @permission('manage-companies')
            <li class="{{ active_class(Active::checkUriPattern('admin/company*')) }}">
                <a href="{{ route('admin.company.index') }}">
                    <i class="fa fa-building"></i>
                    <span>{{ trans('menus.backend.sidebar.company') }}</span>
                </a>
            </li>
            @endauth

            @permission('manage-invoices')
            <li class="{{ active_class(Active::checkUriPattern('admin/invoice*')) }}">
                <a href="{{ route('admin.invoice.index') }}">
                    <i class="fa fa-money"></i>
                    <span>{{ trans('menus.backend.sidebar.invoice') }}</span>
                </a>
            </li>
            @endauth

            @permission('manage-orders')
            <li class="{{ active_class(Active::checkUriPattern('admin/order*')) }}">
                <a href="{{ route('admin.order.index') }}">
                    <i class="fa fa-first-order"></i>
                    <span>Order List</span>
                </a>
            </li>
            @endauth

            @permission('manage-phones')
            <li class="{{ active_class(Active::checkUriPattern('admin/phone*')) }}">
                <a href="{{ route('admin.phone.index') }}">
                    <i class="fa fa-phone"></i>
                    <span>{{ trans('menus.backend.sidebar.phone') }}</span>
                </a>
            </li>
            @endauth

            @role(1)

            <li class="header">{{ trans('menus.backend.sidebar.system') }}</li>

            @permission('manage-menus')
            <li class="{{ active_class(Active::checkUriPattern('admin/menu*')) }}">
                <a href="{{ route('admin.menu.index') }}">
                    <i class="fa fa-meanpath"></i>
                    <span>{{ trans('menus.backend.sidebar.menu') }}</span>
                </a>
            </li>
            @endauth

            <li class="{{ active_class(Active::checkUriPattern('admin/access/*')) }} treeview">
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


            <li class="{{ active_class(Active::checkUriPattern('admin/setting/*')) }} treeview">
                <a href="#">
                    <i class="fa fa-cogs"></i>
                    <span>{{ trans('menus.backend.sidebar.setting.title') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/setting/*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/setting/*'), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/setting/config/general')) }}">
                        <a href="{{ route('admin.setting.config.general') }}">
                            <i class="fa fa-circle-o"></i>
                            <span>{{ trans('menus.backend.sidebar.setting.general') }}</span>
                        </a>
                    </li>
                    <li class="{{ active_class(Active::checkUriPattern('admin/setting/config/company')) }}">
                        <a href="{{ route('admin.setting.config.company') }}">
                            <i class="fa fa-circle-o"></i>
                            <span>{{ trans('menus.backend.sidebar.setting.company') }}</span>
                        </a>
                    </li>
                    <li class="{{ active_class(Active::checkUriPattern('admin/setting/config/system')) }}">
                        <a href="{{ route('admin.setting.config.system') }}">
                            <i class="fa fa-circle-o"></i>
                            <span>{{ trans('menus.backend.sidebar.setting.system') }}</span>
                        </a>
                    </li>
                    <li class="{{ active_class(Active::checkUriPattern('admin/setting/config/mail')) }}">
                        <a href="{{ route('admin.setting.config.mail') }}">
                            <i class="fa fa-circle-o"></i>
                            <span>{{ trans('menus.backend.sidebar.setting.mail') }}</span>
                        </a>
                    </li>
                    <li class="{{ active_class(Active::checkUriPattern('admin/setting/config/payment')) }}">
                        <a href="{{ route('admin.setting.config.payment') }}">
                            <i class="fa fa-circle-o"></i>
                            <span>{{ trans('menus.backend.sidebar.setting.payment') }}</span>
                        </a>
                    </li>
                    <li class="{{ active_class(Active::checkUriPattern('admin/setting/config/api')) }}">
                        <a href="{{ route('admin.setting.config.api') }}">
                            <i class="fa fa-circle-o"></i>
                            <span>API Setting</span>
                        </a>
                    </li>
                    <li class="{{ active_class(Active::checkUriPattern([ 'admin/setting/translation*','admin/setting/language*' ])) }} ">
                        <a href="{{ route('admin.setting.language.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <span>{{ trans('menus.backend.sidebar.setting.translation') }}</span>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="{{ active_class(Active::checkUriPattern('admin/log-viewer*')) }} treeview">
                <a href="#">
                    <i class="fa fa-list"></i>
                    <span>{{ trans('menus.backend.log-viewer.main') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/log-viewer*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/log-viewer*'), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/log-viewer')) }}">
                        <a href="{{ route('log-viewer::dashboard') }}">
                            <i class="fa fa-circle-o"></i>
                            <span>{{ trans('menus.backend.log-viewer.dashboard') }}</span>
                        </a>
                    </li>

                    <li class="{{ active_class(Active::checkUriPattern('admin/log-viewer/logs')) }}">
                        <a href="{{ route('log-viewer::logs.list') }}">
                            <i class="fa fa-circle-o"></i>
                            <span>{{ trans('menus.backend.log-viewer.logs') }}</span>
                        </a>
                    </li>
                </ul>
            </li>

            @endauth
        </ul><!-- /.sidebar-menu -->
    </section><!-- /.sidebar -->
</aside>