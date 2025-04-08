<!DOCTYPE html>
<html lang="vi">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="author" content="Codescandy" />
    <title>Quản Lý Lớp Học - @yield('title')</title>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-M8S4MT3EYG"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-M8S4MT3EYG');
    </script>

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon/favicon.ico') }}" />

    <!-- Color modes -->
    <script src="{{ asset('assets/js/vendors/color-modes.js')}}"></script>

    <!-- Libs CSS -->
    <link href="{{ asset('assets/libs/bootstrap-icons/font/bootstrap-icons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/@mdi/font/css/materialdesignicons.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/simplebar/dist/simplebar.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/theme.min.css') }}">
</head>

<body>
<main id="main-wrapper" class="main-wrapper">
    <div class="header">
        <!-- navbar -->
        <div class="navbar-custom navbar navbar-expand-lg">
            <div class="container-fluid px-0">
                <a class="navbar-brand d-block d-md-none" href="../index.html">
                    <img src="../assets/images/brand/logo/logo-2.svg" alt="Hình ảnh" />
                </a>

                <a id="nav-toggle" href="#!" class="ms-auto ms-md-0 me-0 me-lg-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-text-indent-left text-muted" viewBox="0 0 16 16">
                        <path
                            d="M2 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm.646 2.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L4.293 8 2.646 6.354a.5.5 0 0 1 0-.708zM7 6.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"
                        />
                    </svg>
                </a>

                <div class="d-none d-md-none d-lg-block">
                    <!-- Form -->
                    <form action="#">
                        <div class="input-group">
                            <input class="form-control rounded-3 bg-transparent ps-9" type="search" value="" id="searchInput" placeholder="Tìm kiếm" />
                            <span class="">
       <button class="btn position-absolute start-0" type="button">
        <svg
            xmlns="http://www.w3.org/2000/svg"
            width="15"
            height="15"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
            class="feather feather-search text-dark"
        >
         <circle cx="11" cy="11" r="8"></circle>
         <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
        </svg>
       </button>
      </span>
                        </div>
                    </form>
                </div>
                <!--Navbar nav -->
                <ul class="navbar-nav navbar-right-wrap ms-lg-auto d-flex nav-top-wrap align-items-center ms-4 ms-lg-0">
                    <li>
                        <div class="dropdown">
                            <button class="btn btn-ghost btn-icon rounded-circle" type="button" aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
                                <i class="bi theme-icon-active"></i>
                                <span class="visually-hidden bs-theme-text">Thay đổi màu</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bs-theme-text">
                                <li>
                                    <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
                                        <i class="bi theme-icon bi-sun-fill"></i>
                                        <span class="ms-2">Sáng</span>
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
                                        <i class="bi theme-icon bi-moon-stars-fill"></i>
                                        <span class="ms-2">Tối</span>
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
                                        <i class="bi theme-icon bi-circle-half"></i>
                                        <span class="ms-2">Tự động</span>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="dropdown stopevent ms-2">
                        <a class="btn btn-ghost btn-icon rounded-circle" href="#!" role="button" id="dropdownNotification" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-xs" data-feather="bell"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end" aria-labelledby="dropdownNotification">
                            <div>
                                <div class="border-bottom px-3 pt-2 pb-3 d-flex justify-content-between align-items-center">
                                    <p class="mb-0 text-dark fw-medium fs-4">Thông báo</p>
                                    <a href="#!" class="text-muted">
         <span>
          <i class="me-1 icon-xs" data-feather="settings"></i>
         </span>
                                    </a>
                                </div>
                                <div data-simplebar style="height: 250px">
                                    <!-- List group -->
                                    <ul class="list-group list-group-flush notification-list-scroll">
                                        <!-- List group item -->
                                        <li class="list-group-item bg-light">
                                            <a href="#!" class="text-muted">
                                                <h5 class="mb-1">Rishi Chopra</h5>
                                                <p class="mb-0">Mauris blandit erat id nunc blandit, ac eleifend dolor pretium.</p>
                                            </a>
                                        </li>
                                        <!-- List group item -->
                                        <li class="list-group-item">
                                            <a href="#!" class="text-muted">
                                                <h5 class="mb-1">Neha Kannned</h5>
                                                <p class="mb-0">Proin at elit vel est condimentum elementum id in ante. Maecenas et sapien metus.</p>
                                            </a>
                                        </li>
                                        <!-- List group item -->
                                        <li class="list-group-item">
                                            <a href="#!" class="text-muted">
                                                <h5 class="mb-1">Nirmala Chauhan</h5>
                                                <p class="mb-0">Morbi maximus urna lobortis elit sollicitudin sollicitudieget elit vel pretium.</p>
                                            </a>
                                        </li>
                                        <!-- List group item -->
                                        <li class="list-group-item">
                                            <a href="#!" class="text-muted">
                                                <h5 class="mb-1">Sina Ray</h5>
                                                <p class="mb-0">Sed aliquam augue sit amet mauris volutpat hendrerit sed nunc eu diam.</p>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="border-top px-3 py-2 text-center">
                                    <a href="#!" class="text-inherit">Xem tất cả thông báo</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- List -->
                    <li class="dropdown ms-2">
                        <a class="rounded-circle" href="#!" role="button" id="dropdownUser" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="avatar avatar-md avatar-indicators avatar-online">
                                <img alt="avatar" src="../assets/images/avatar/avatar-11.jpg" class="rounded-circle" />
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
                            <div class="px-4 pb-0 pt-2">
                                <div class="lh-1">
                                    <h5 class="mb-1">John E. Grainger</h5>
                                    <a href="{{ route('profile.edit') }}" class="text-inherit fs-6">Xem hồ sơ của tôi</a>
                                </div>
                                <div class="dropdown-divider mt-3 mb-2"></div>
                            </div>

                            <ul class="list-unstyled">
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="{{ route('profile.edit') }}">
                                        <i class="me-2 icon-xxs dropdown-item-icon" data-feather="user"></i>
                                        Chỉnh sửa hồ sơ
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('password.form') }}">
                                        <i class="me-2 icon-xxs dropdown-item-icon" data-feather="activity"></i>
                                        Thay đổi mật khẩu
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="#!">
                                        <i class="me-2 icon-xxs dropdown-item-icon" data-feather="settings"></i>
                                        Cấu hình
                                    </a>
                                </li>
                                <li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="me-2 icon-xxs dropdown-item-icon" data-feather="power"></i>
                                        Đăng xuất
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- navbar vertical -->


    <!-- Sidebar -->

    <div class="navbar-vertical navbar nav-dashboard">
        <div class="h-100" data-simplebar>
            <!-- Brand logo -->
            <a class="navbar-brand" href="../index.html">
                <img src="../assets/images/brand/logo/logo-2.svg" alt="dash ui - giao diện quản trị bootstrap 5" />
            </a>
            <!-- Navbar nav -->
            <ul class="navbar-nav flex-column" id="sideNavbar">
                <!-- Nav item -->
                <li class="nav-item">
                    <a
                        class="nav-link has-arrow  collapsed "
                        href="#!"
                        data-bs-toggle="collapse"
                        data-bs-target="#navDashboard"
                        aria-expanded="false"
                        aria-controls="navDashboard"
                    >
                        <i data-feather="home" class="nav-icon me-2 icon-xxs"></i>
                        Trang chủ
                    </a>

                    <div id="navDashboard" class="collapse " data-bs-parent="#sideNavbar">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                                   href="{{ route('dashboard') }}">
                                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                                </a>
                            </li>
                            {{--                            <li class="nav-item">--}}
                            {{--                                <a class="nav-link " href="../index.html">Project</a>--}}
                            {{--                            </li>--}}

                            {{--                            <li class="nav-item">--}}
                            {{--                                <a class="nav-link has-arrow " href="../pages/dashboard-ecommerce.html">Ecommerce</a>--}}
                            {{--                            </li>--}}
                            {{--                            <li class="nav-item">--}}
                            {{--                                <a class="nav-link has-arrow " href="../pages/dashboard-crm.html">CRM</a>--}}
                            {{--                            </li>--}}
                            {{--                            <li class="nav-item">--}}
                            {{--                                <a class="nav-link has-arrow " href="../pages/dashboard-finance.html">Finance</a>--}}
                            {{--                            </li>--}}
                            {{--                            <li class="nav-item">--}}
                            {{--                                <a class="nav-link has-arrow " href="../pages/dashboard-blog.html">Blog</a>--}}
                            {{--                            </li>--}}
                        </ul>
                    </div>
                </li>

                <!-- Nav item -->
                <li class="nav-item">
                    <div class="navbar-heading">Ứng dụng</div>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('classrooms.*') ? 'active' : '' }}"
                       href="{{ route('classrooms.index') }}">
                        <i class="bi bi-building me-2"></i>Lớp học
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('students.*') ? 'active' : '' }}"
                       href="{{ route('students.index') }}">
                        <i class="bi bi-people me-2"></i> Học sinh
                    </a>
                </li>

            </ul>
            <div class="card bg-light shadow-none text-center mx-4 my-8">
                <div class="card-body py-6">
                    <img src="../assets/images/background/giftbox.png" alt="dash ui - mẫu bảng điều khiển quản trị" />
                    <div class="mt-4">
                        <h5>Truy cập không giới hạn</h5>
                        <p class="fs-6 mb-4">Nâng cấp gói của bạn từ bản dùng thử miễn phí lên chọn Gói doanh nghiệp. Bắt đầu ngay</p>
                        <a href="#" class="btn btn-secondary btn-sm">Nâng cấp ngay</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Page Content -->
    <div id="app-content">

        <!-- Container fluid -->
        <div class="app-content-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <!-- Page header -->
                        <div id="content" class="main-content">
                            <div class=" ">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>




<!-- Modal -->
<div class="modal fade" id="addCustomerModal" tabindex="-1" aria-labelledby="addCustomerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addCustomerModalLabel">Thêm khách hàng</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div >
                        <div class="mb-3">
                            <label for="customerName" class="form-label">Tên khách hàng</label>
                            <input type="text" class="form-control" placeholder="Nhập tên" id="customerName">
                        </div>
                        <div class="mb-3">
                            <label for="customerEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" placeholder="Nhập Email" id="customerEmail">
                        </div>
                        <div class="mb-3">
                            <label for="customerPhone" class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control" placeholder="Nhập số điện thoại" id="customerPhone">
                        </div>
                        <div class="mb-3">
                            <label for="customerDate" class="form-label">Ngày tham gia</label>
                            <input type="text" class="form-control flatpickr" placeholder="Chọn ngày" id="customerDate">
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn btn-primary me-1">+ Thêm khách hàng</button>
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Đóng</button>
                        </div>

                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

<script src="{{ asset('assets/libs/flatpickr/dist/flatpickr.min.js')}}"></script>

<!-- Libs JS -->

<script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/feather-icons/dist/feather.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/dist/simplebar.min.js') }}"></script>

<!-- Theme JS -->
<script src="{{ asset('assets/js/theme.min.js') }}"></script>

<!-- popper js -->
<script src="{{ asset('assets/libs/@popperjs/core/dist/umd/popper.min.js') }}"></script>
<!-- tippy js -->
<script src="{{ asset('assets/libs/tippy.js/dist/tippy-bundle.umd.min.js') }}"></script>
<script src="{{ asset('assets/js/vendors/tooltip.js') }}"></script>



</body>

</html>
