<div class="vertical-menu">

    <div class="h-100">

        <div class="user-wid text-center py-4">
            <div class="user-img">
                <img src="{{asset('/')}}assets/admin/images/users/avatar-2.jpg" alt="" class="avatar-md mx-auto rounded-circle">
            </div>

            <div class="mt-3">

                <a href="#" class="text-dark font-weight-medium font-size-16">{{auth()->user()->name}}</a>
                <p class="text-body mt-1 mb-0 font-size-13">{{auth()->user()->name}}</p>

            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="mdi mdi-airplay"></i><span class="badge badge-pill badge-info float-right"></span>
                        <span>Dashboard</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-flip-horizontal"></i>
                        <span>User</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('users.index')}}">User List</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{route('notice.index')}}" class="">
                        <i class="mdi mdi-flip-horizontal"></i>
                        <span>Notice</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('tiket.list')}}" class="">
                        <i class="mdi mdi-flip-horizontal"></i>
                        <span>Tiket</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>