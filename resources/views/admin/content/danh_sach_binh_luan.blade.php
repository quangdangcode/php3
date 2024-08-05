@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Danh sách bình luận
            </h1>
        </section>
        <section class="content">
            <div class="row container-fluid">
                <div class="col-md-11">
                    <div class="box box-primary">
                        <table class="table">
                            <tr>
                                <th scope="col" class="col-1"></th>
                                <th scope="col" class="col-3">Nội dung bình luận</th>
                                <th scope="col" class="col-4">Người dùng bình luận</th>
                                <th scope="col" class="col-2">Bài viết bình luận</th>
                                <th scope="col" class="col-2">Thời gian</th>
                            </tr>
                            @foreach ($comments as $comments)
                            <tr>
                                    <td>{{ $comments->id }}</td>
                                    <td>{{ $comments->content }}</td>
                                    <td>{{ $comments->user->name }}</td>
                                    <td>{{ $comments->post->title }}</td>
                                    <td>{{ $comments->created_at }}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
