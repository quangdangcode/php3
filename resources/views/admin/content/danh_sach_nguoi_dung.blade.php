@extends('admin.layouts.master')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Danh sách người dùng
        </h1>
    </section>
    <section class="content">
        <div class="row container-fluid">
            <div class="col-md-11">
                <div class="box box-primary">
                    <table class="table">
                        <tr>
                            <th scope="col" class="col-2"></th>
                            <th scope="col" class="col-2">Tên</th>
                            <th scope="col" class="col-2">Mật khẩu</th>
                            <th scope="col" class="col-2">Email</th>
                            <th scope="col" class="col-2">Quyền</th>
                        </tr>  
                        @foreach ($user as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->password }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                        </tr>  
                        @endforeach                                                            
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection