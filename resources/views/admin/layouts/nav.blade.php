<section class="sidebar">
    <div class="user-panel">
        <div class="pull-left image">
            <img src="{{ asset('theme/admin/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image" />
        </div>
        <div class="pull-left info">
            <p>Admin</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Tìm kiếm..." />
            <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i
                        class="fa fa-search"></i></button>
            </span>
        </div>
    </form>
    <ul class="sidebar-menu">
        <li class="header">ĐIỀU HƯỚNG CHÍNH</li>
        <li class="active treeview">
            <a href="{{ route('admin.dashboard') }}">
                <i class="fa fa-dashboard"></i> <span>Bảng điều khiển</span>
            </a>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-building"></i>
                <span>Chuyên mục</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('danh_sach_chuyen_muc') }}"><i class="fa fa-circle-o"></i>Danh sách</a></li>
                <li><a href="{{ route('them_chuyen_muc') }}"><i class="fa fa-circle-o"></i>Thêm chuyên mục</a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-building-o"></i>
                <span>Bản tin</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('danh_sach_ban_tin') }}"><i class="fa fa-circle-o"></i>Danh sách</a></li>
                <li><a href="{{ route('them_ban_tin') }}"><i class="fa fa-circle-o"></i>Thêm tin tức</a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-group"></i>
                <span>Người dùng</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('danh_sach_nguoi_dung') }}"><i class="fa fa-circle-o"></i>Danh sách</a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-comment"></i>
                <span>Bình luận</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('danh_sach_binh_luan') }}"><i class="fa fa-circle-o"></i>Danh
                        sách</a></li>
            </ul>
        </li>
        <li class="active treeview">
            <a href="{{ route('client.home') }}">
                <i class="fa fa-dashboard"></i> <span>Trang chủ</span>
            </a>
        </li>
    </ul>
</section>
