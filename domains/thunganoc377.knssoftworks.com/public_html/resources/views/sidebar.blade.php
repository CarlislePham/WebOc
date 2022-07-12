        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('index')}}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-fish"></i>
                </div>
                <div class="sidebar-brand-text mx-3"> Admin <sup>377</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{route('index')}}">
                    <i class="fa fa-home"></i>
                    <span>Trang Chủ</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Quản Lý Menu
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="{{route('manage_food')}}">
                    <i class="fas fa-utensils"></i>
                    <span>Món Ăn</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('manage_category')}}">
                    <i class="fab fa-elementor"></i>
                    <span>Danh Mục Món</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Khác
            </div>

            <!-- Nav Item - Pages Collapse Menu -->

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="{{route('manage_bill')}}">
                    <i class="fas fa-file-invoice-dollar"></i>
                    <span>Hóa Đơn</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="{{route('manage_user')}}">
                    <i class="fas fa-users"></i>
                    <span>Nhân Viên</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('manage_table')}}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Bàn</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('manage_dt')}}">
                    <i class="fas fa-dollar-sign"></i>
                    <span>Doanh Thu</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="source/img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div>

        </ul>