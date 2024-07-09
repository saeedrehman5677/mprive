<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none"  style="text-align: center ;  margin-bottom: 15px">
        <img style="width:150px" class="img" src="{{asset('img/logo-white.png')}}">
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('viewing_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.viewings.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/viewings") || request()->is("admin/viewings/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-eye c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.viewing.title') }}
                </a>
            </li>
        @endcan
        @can('contact_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.contacts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/contacts") || request()->is("admin/contacts/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-envelope c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.contact.title') }}
                </a>
            </li>
        @endcan
        @can('property_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/property-types*") ? "c-show" : "" }} {{ request()->is("admin/amenities*") ? "c-show" : "" }} {{ request()->is("admin/sales*") ? "c-show" : "" }} {{ request()->is("admin/for-rents*") ? "c-show" : "" }} {{ request()->is("admin/new-projects*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-building c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.property.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('developer_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.developers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/developers") || request()->is("admin/developers/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-hospital-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.developer.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('property_type_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.property-types.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/property-types") || request()->is("admin/property-types/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-arrow-right c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.propertyType.title') }}
                            </a>
                        </li>
                    @endcan

                    @can('amenity_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.amenities.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/amenities") || request()->is("admin/amenities/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-arrow-right c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.amenity.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('sale_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.sales.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sales") || request()->is("admin/sales/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-arrow-right c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.sale.title') }}
                            </a>
                        </li>
                    @endcan

                </ul>
            </li>
        @endcan
        @can('faq_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/faq-categories*") ? "c-show" : "" }} {{ request()->is("admin/faqs*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-question-circle c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.faqManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('faq_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.faq-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/faq-categories") || request()->is("admin/faq-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-arrow-right c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.faqCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('faq_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.faqs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/faqs") || request()->is("admin/faqs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-arrow-right c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.faq.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('team_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.teams.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/teams") || request()->is("admin/teams/*") ? "c-active" : "" }}">
                    <i class="fa-fw fab fa-teamspeak c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.team.title') }}
                </a>
            </li>
        @endcan
        @can('our_service_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.our-services.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/our-services") || request()->is("admin/our-services/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-th c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.ourService.title') }}
                </a>
            </li>
        @endcan
        @can('blog_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.blogs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/blogs") || request()->is("admin/blogs/*") ? "c-active" : "" }}">
                    <i class="fa-fw fab fa-blogger c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.blog.title') }}
                </a>
            </li>
        @endcan
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>
