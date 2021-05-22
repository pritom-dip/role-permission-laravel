<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">

                @if(!empty(Auth::user()->image))
                <img class="img-circle" src="{{ asset('storage/images/'. Auth::user()->image) }}" alt="User profile picture" />
                @else
                <img class="img-circle" src="{{asset('admin_assets/lte/dist/img/user1-128x128.jpg.jpg')}}" alt="User profile picture" />
                @endif

            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>

            <x-sidebarComponent />


            <!---------------------- Delete -------------------------------->

            {{-- <li class="treeview">
                <a href="#">
                    <i class="fa fa-cogs"></i> <span>System Settings</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{route('menu.index')}}"><i class="fa fa-circle-o"></i> Authorized Menu</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="{{route('admin.index')}}">
                    <i class="fa fa-users"></i> <span>Admins</span>
                </a>
            </li> --}}
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>