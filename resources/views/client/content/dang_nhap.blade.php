@extends('client.layouts.master')
@section('content')
    @if (session('success'))
        <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <form action="{{ route('xu_ly_dang_nhap') }}" method="POST">
        @csrf
        <div class="container">
            <h1>Đăng Nhập</h1>
            <p>Vui lòng điền vào mẫu này để đăng nhập.</p>
            <hr>
            <label for="email"><b>Email</b></label><br>
            <input type="email" class="form-control w-50" placeholder="Email" name="email" id="email"
                value="{{ old('email') }}">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <hr>
            <label for="password"><b>Mật khẩu</b></label><br>
            <input type="password" class="form-control w-50" placeholder="Mật khẩu" name="password" id="password">
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <hr>
            <p>Bằng cách tạo một tài khoản, bạn đồng ý với chúng tôi <a href="#">Điều khoản & Quyền riêng tư</a>.</p>
            <button type="submit" class="btn btn-primary">Đăng nhập</button>
        </div><br>
        <div class="container signin">
            <p>Nếu bạn chưa có tài khoản hãy <a href="{{ route('dang_ky') }}">Đăng ký</a>.</p>
        </div>
        <div class="container signin">
            <p>Nếu bạn quên mật khẩu <a href="{{ route('quen_mat_khau') }}">Lấy lại mật khẩu</a>.</p>
        </div>
    </form>
@endsection

<script>
    setTimeout(function() {
        $('#success-alert').alert('close');
    }, 3000);
</script>
