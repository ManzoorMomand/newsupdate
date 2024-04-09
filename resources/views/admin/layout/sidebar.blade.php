<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin_home') }}">Admin Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin_home') }}"></a>
        </div>

        <ul class="sidebar-menu">
            <li class="{{ request()->routeIs('admin_home') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_home') }}"><i class="fas fa-home"></i> <span>Dashboard</span></a>
            </li>

            <li class="nav-item dropdown {{ request()->routeIs('admin_top_ad_show', 'admin_home_ad_show', 'admin_sidebar_ad_show') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-eye"></i><span>Advertisements</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('admin_top_ad_show') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin_top_ad_show') }}"><i class="fas fa-ad"></i> Top Advertisement</a>
                    </li>
                    <li class="{{ request()->routeIs('admin_home_ad_show') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin_home_ad_show') }}"><i class="fas fa-ad"></i> Home Advertisement</a>
                    </li>
                    <li class="{{ request()->routeIs('admin_sidebar_ad_show') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin_sidebar_ad_show') }}"><i class="fas fa-ad"></i> Sidebar Advertisement</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown {{ request()->routeIs('admin_category_show', 'admin_sub_category_show', 'admin_post_show') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-list"></i><span>Category</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('admin_category_show') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin_category_show') }}"><i class="fas fa-list"></i> Category Show</a>
                    </li>
                    <li class="{{ request()->routeIs('admin_sub_category_show') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin_sub_category_show') }}"><i class="fas fa-list"></i> Sub Category</a>
                    </li>
                    <li class="{{ request()->routeIs('admin_post_show_ajax') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin_post_show_ajax') }}"><i class="fas fa-list"></i> Post</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown {{ request()->routeIs('admin_setting') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-cog"></i><span>Setting</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('admin_setting') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin_setting') }}"><i class="fas fa-cog"></i> Setting</a>
                    </li>
                </ul>
            </li>

            <li class="{{ request()->routeIs('admin_photo_show') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_photo_show') }}">
                    <i class="fas fa-camera"></i> Gallery
                </a>
            </li>

            <li class="{{ request()->routeIs('admin_video_show') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_video_show') }}">
                    <i class="fas fa-video"></i> Video
                </a>
            </li>

            <li class="{{ request()->routeIs('admin_live_show') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_live_show') }}">
                    <i class="fas fa-video"></i> Live Video
                </a>
            </li>

            <li class="{{ request()->routeIs('admin_online_poll_show') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_online_poll_show') }}">
                    <i class="fas fa-list"></i> Online Poll
                </a>
            </li>

            <li class="{{ request()->routeIs('admin_social_item_show') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_social_item_show') }}">
                    <i class="fas fa-list"></i> Social Item
                </a>
            </li>

            <li class="{{ request()->routeIs('admin_author_user_show') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_author_user_show') }}">
                    <i class="fas fa-list"></i> Author
                </a>
            </li>
            <li class="{{ request()->routeIs('contact.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('contact.index') }}">
                    <i class="fas fa-list"></i> Contact
                </a>
            </li>

            <li class="nav-item dropdown {{ request()->routeIs('admin_page_show', 'admin_faq_show', 'admin_contact_show', 'admin_login_show', 'admin_term_show', 'admin_policy_show', 'admin_disclaimer_show') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-list"></i><span>Pages</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('admin_page_show') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin_page_show') }}"><i class="fas fa-ad"></i> About</a>
                    </li>
                    <li class="{{ request()->routeIs('admin_faq_show') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin_faq_show') }}"><i class="fas fa-ad"></i> FAQ</a>
                    </li>
                    <li class="{{ request()->routeIs('admin_contact_show') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin_contact_show') }}"><i class="fas fa-ad"></i> Contact</a>
                    </li>
                    <li class="{{ request()->routeIs('admin_login_show') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin_login_show') }}"><i class="fas fa-ad"></i> Login</a>
                    </li>
                    <li class="{{ request()->routeIs('admin_term_show') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin_term_show') }}"><i class="fas fa-ad"></i> Term and Condition</a>
                    </li>
                    <li class="{{ request()->routeIs('admin_policy_show') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin_policy_show') }}"><i class="fas fa-ad"></i> Privacy Policy</a>
                    </li>
                    <li class="{{ request()->routeIs('admin_disclaimer_show') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin_disclaimer_show') }}"><i class="fas fa-ad"></i> Disclaimer</a>
                    </li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
