    <!-- ========== Left Sidebar Start ========== -->
    <div class="left-side-menu">

        <div class="h-100" data-simplebar>


            <!--- Sidemenu -->
            <div id="sidebar-menu">

                <ul id="side-menu">

                    <li class="menu-title">Navigation</li>
                    <li>
                        <a href="#sidebarEcommerce" data-toggle="collapse">
                            <i data-feather="book"></i>
                            <span> Blog </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarEcommerce">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{route('admin.catrgory')}}">Category</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.blog')}}">Blog list</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="{{route('admin_message')}}">
                            <i data-feather="message-square"></i>
                            <span> Messages </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin_about')}}">
                            <i data-feather="edit"></i>
                            <span> About page </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin_contact')}}">
                            <i data-feather="info"></i>
                            <span> Contact info </span>
                        </a>
                    </li>
                </ul>

            </div>
            <!-- End Sidebar -->

            <div class="clearfix"></div>

        </div>
        <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->