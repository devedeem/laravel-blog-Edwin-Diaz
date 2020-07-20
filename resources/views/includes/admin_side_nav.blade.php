{{--<div class="navbar-default sidebar" role="navigation">--}}
{{--    <div class="sidebar-nav navbar-collapse">--}}
{{--        <ul class="nav" id="side-menu">--}}
{{--            <li>--}}
{{--                <a href="/profile"><i class="fa fa-user "></i>Profile</a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a data-toggle="collapse" href="#posts"><i class="fa fa-wrench fa-fw"></i> Posts<span class="fa arrow"></span></a>--}}
{{--                <ul class="nav nav-second-level collapse" id="posts">--}}
{{--                    <li>--}}
{{--                        <a href="">All Posts</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="">Create Post</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--                <!-- /.nav-second-level -->--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--</div>--}}



{{--Side Nav--}}

<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse collapse">
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
                <a href="/admin"><i class="active fas fa-tachometer-alt" aria-hidden="true"></i> Dashboard</a>
            </li>
            {{--users--}}
            <li >
                <a data-toggle="collapse" data-target="#users" href=""><i class="fa fa-users"></i> Users<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse " id="users">
                    <li >
                        <a href="{{route('users.index')}}">All Users</a>
                    </li>
                    <li >
                        <a href="{{route('users.create')}}">Create User</a>
                    </li>
                    <li >
                        <a href="{{route('users.trash')}}">Trash</a>
                    </li>
                </ul>

                <!-- /.nav-second-level -->
            </li>
            {{--Posts--}}
            <li>
                <a data-toggle="collapse" href="#posts"><i class="fa fa-comments"></i> Posts<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse" id="posts">
                    <li>
                        <a href="{{route('posts.index')}}">All Posts</a>
                    </li>
                    <li>
                        <a href="{{route('posts.create')}}">Create Post</a>
                    </li>
                    <li>
                        <a href="{{route('comments.index')}}">Post Comments</a>
                    </li>
                    <li>
                        <a href="{{route('trash.comments')}}">Trash Comments</a>
                    </li>
                    <li>
                        <a href="{{route('posts.trash')}}">Trash</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            {{--categories--}}
            <li>
                <a data-toggle="collapse" href="#categories"><i class="fa fa-list fa-sm" aria-hidden="true"></i> Categories<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse" id="categories">
                    <li>
                        <a href="{{route('categories.index')}}">All Categories</a>
                    </li>
                    <li>
                        <a href="{{route('categories.trash')}}">Trash</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            {{--media--}}
            <li>
                <a data-toggle="collapse" href="#media"><i class="fa fa-music" aria-hidden="true"></i> Media<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse" id="media">
                    <li>
                        <a href="{{route('media.index')}}">All Media</a>
                    </li>
                    <li>
                        <a href="{{route('media.create')}}">Upload Media</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            {{-- charts--}}
            <li>
                <a data-toggle="collapse" href="#chart"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse" id="chart">
                    <li>
                        <a href="flot.html">Flot Charts</a>
                    </li>
                    <li>
                        <a href="morris.html">Morris.js Charts</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            {{--tables--}}
            <li>
                <a href="tables.html"><i class="fa fa-table fa-fw"></i> Tables</a>
            </li>
            {{--forms--}}
            <li>
                <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a>
            </li>
            {{--Ui Elements--}}
            <li>
                <a data-toggle="collapse" href="#uielements"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse" id="uielements">
                    <li>
                        <a href="panels-wells.html">Panels and Wells</a>
                    </li>
                    <li>
                        <a href="buttons.html">Buttons</a>
                    </li>
                    <li>
                        <a href="notifications.html">Notifications</a>
                    </li>
                    <li>
                        <a href="typography.html">Typography</a>
                    </li>
                    <li>
                        <a href="icons.html"> Icons</a>
                    </li>
                    <li>
                        <a href="grid.html">Grid</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            {{--Multi-Level Dropdown--}}
            <li>
                <a data-toggle="collapse" href="#multileveldropdown"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse" id="multileveldropdown">
                    <li>
                        <a href="#">Second Level Item</a>
                    </li>
                    <li>
                        <a href="#">Second Level Item</a>
                    </li>
                    <li>
                        <a href="#">Third Level <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="#">Third Level Item</a>
                            </li>
                            <li>
                                <a href="#">Third Level Item</a>
                            </li>
                            <li>
                                <a href="#">Third Level Item</a>
                            </li>
                            <li>
                                <a href="#">Third Level Item</a>
                            </li>
                        </ul>
                        <!-- /.nav-third-level -->
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            {{--site pages--}}
            <li class="">
                <!-- <= Active Class -->
                <a data-toggle="collapse" href="#pages"><i class="fa fa-files-o fa-fw"></i> Site Pages<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse" id="pages">
                    <li>
                        <a class="active" href="blank.html">Blank Page</a>
                    </li>
                    <li>
                        <a href="login.html">Login Page</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>