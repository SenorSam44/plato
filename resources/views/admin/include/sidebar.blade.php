<div class="sidebar-nav navbar-collapse">
    <ul class="nav" id="side-menu">
        <li class="sidebar-search">
            <div class="input-group custom-search-form">
                <input type="text" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
            </div>
            <!-- /input-group -->
        </li>
        <li>
            <a href="{{ URL::to('/admin') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
        </li>
        
        <li>
            <a href="#"><i class="fa fa-info fa-fw"></i> About <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{URL::to('admin/about')}}">Add About</a>
                </li>
                <li>
                    <a href="{{URL::to('admin/abouts')}}">Manage Abouts</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Banners <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{URL::to('admin/banner')}}">Add Banner</a>
                </li>
                <li>
                    <a href="{{URL::to('admin/banners')}}">Manage Banners</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="#"><i class="fa fa-sliders fa-fw"></i> Categories <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{URL::to('admin/category')}}">Add Category</a>
                </li>
                <li>
                    <a href="{{URL::to('admin/categories')}}">Manage Categories</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="#"><i class="fa fa-product-hunt fa-fw"></i> Projects <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{URL::to('admin/project')}}">Add Project</a>
                </li>
                <li>
                    <a href="{{URL::to('admin/projects')}}">Manage Projects</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="#"><i class="fa fa-braille fa-fw"></i> Services <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{URL::to('admin/service')}}">Add Service</a>
                </li>
                <li>
                    <a href="{{URL::to('admin/services')}}">Manage Services</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="#"><i class="fa fa-product-hunt fa-fw"></i> News and Events <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{URL::to('admin/new')}}">Add News</a>
                </li>
                <li>
                    <a href="{{URL::to('admin/news')}}">Manage News</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="#"><i class="fa fa-users fa-fw"></i> Team Members <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{URL::to('admin/member')}}">Add Team Member</a>
                </li>
                <li>
                    <a href="{{URL::to('admin/members')}}">Manage Team Members</a>
                </li>
            </ul>
        </li>        

        <li>
            <a href="#"><i class="fa fa-braille fa-fw"></i> Client Reviews <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{URL::to('admin/review')}}">Add Reviews</a>
                </li>
                <li>
                    <a href="{{URL::to('admin/reviews')}}">Manage Reviews</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="#"><i class="fa fa-braille fa-fw"></i> Messages <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{URL::to('admin/messages')}}">Manage Messages</a>
                </li>
            </ul>
        </li>
    </ul>
</div>
<!-- /.sidebar-collapse -->