<div class="sidebar">
    <aside>
        <div class="avatar">
            <img src="{{ asset('theme/library/img/profile-image.png') }}" alt="avatar" />
            <h1 class="name">Designly</h1>
        </div>
        <nav>
            <ul>
                <li><a href=""><i class="icon search"></i><span>Dashboard</span></a></li>
                <li><a href="{{ route('admin.post.list') }}"><i class="icon box"></i><span>Post</span></a></li>
                <li><a href=""><i class="icon folder open"></i><span>Category</span></a></li>
                <li><a href=""><i class="icon pallet"></i><span>Source</span></a></li>
                <li><a href=""><i class="icon user"></i><span>Users</span></a></li>
                <li><a href="{{ url('/logout') }}"><i class="sign out alternate icon"></i><span>logout</span></a></li>
            </ul>
        </nav>
    </aside>
    <div class="clr"></div>
</div>