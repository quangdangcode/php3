<div class="container-fluid p-0 mb-3">
    <nav class="navbar navbar-expand-lg bg-light navbar-light py-lg-4 py-lg-0 px-lg-5">
        <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
            <div class="col-lg-4">
                <a href="" class="navbar-brand d-none d-lg-block">
                    <h1 class="m-0 display-5 text-uppercase"><span class="text-primary">Phòng</span> Tin Tức</h1>
                </a>
            </div>
            <div class="navbar-nav mr-auto py-0">
                <a href="{{ route('client.home') }}" class="nav-item nav-link">Trang chủ</a>
                <div class="navbar-item dropdown">
                    <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">Chuyên mục</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        @php
                            $categories = DB::table('catelories')->get();
                        @endphp
                        @foreach ($categories as $cate)
                            <a href="{{ route('chuyen_muc', $cate->id) }}" class="dropdown-item">{{ $cate->name }}</a>
                        @endforeach
                    </div>
                </div>
                <a href="{{ route('lien_he') }}" class="nav-item nav-link">Liên hệ</a>
            </div>
            <form action="{{ route('search') }}" method="GET">
                <div class="input-group ml-auto" style="width: 100%; max-width: 450px;">
                    <input type="text" name="key" class="form-control" placeholder="Từ khóa">
                    <div class="input-group-append">
                        <button type="submit" class="input-group-text text-secondary"><i
                                class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    @if (Auth::check())
                        {{ Auth::user()->name }}
                    @else
                        Tài khoản
                    @endif
                </a>
                <div class="dropdown-menu rounded-0 m-0">
                    @if (Auth::check())
                        @if (Auth::user()->role == 'admin')
                            <a href="{{ route('admin.dashboard') }}" class="dropdown-item">Trang Admin</a>
                        @endif
                        <a href="#" class="dropdown-item">Thông tin</a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">Đăng xuất</button>
                        </form>
                    @else
                        <a href="{{ route('dang_nhap') }}" class="dropdown-item">Đăng Nhập</a>
                    @endif
                </div>
            </div>
        </div>
    </nav>
</div>
