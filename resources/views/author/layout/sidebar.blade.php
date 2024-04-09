<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('author_home') }}">Author Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('author_home') }}"></a>
        </div>
        <ul class="sidebar-menu">

<li class="active"><a class="nav-link" href="{{ route('author_home') }}"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
<li class="nav-item dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-eye"></i><span>Advertisements</span></a>
                <ul class="dropdown-menu">
                    <li class="active"><a class="nav-link" href="{{route('author_post_show')}}"><i class="fas fa-ad"></i> Post</a></li>
                    
                </ul>
     
</li>



    </aside>
</div>