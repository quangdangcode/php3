@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Danh sách bản tin
            </h1>
        </section>
        <section class="content">
            <div class="row container-fluid">
                <div class="col-md-11">
                    <div class="box box-primary">
                        <table class="table">
                            <tr>
                                <th scope="col" class="col-1">Id</th>
                                <th scope="col" class="col-2">Tiêu đề</th>
                                <th scope="col" class="col-4">Nội dung</th>
                                <th scope="col" class="col-2">Ảnh</th>
                                <th scope="col" class="col-2">Chuyên mục</th>
                                <th scope="col" class="col-1">Thao tác</th>
                            </tr>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->content }}</td>
                                    <td>
                                        <img width="100px" src="{{ \Storage::url($post->image) }}" alt="">
                                    </td>
                                    <td>
                                        {{ $post->catelory_id }}</td>
                                    <td>
                                        <a href="{{ route('sua_ban_tin', ['id' => $post->id]) }}">
                                            <button class="btn btn-success">Sửa</button>
                                        </a>
                                        <form action="{{ route('xoa_ban_tin', ['id' => $post->id]) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Bạn có chắc chắn muốn xóa bản tin này?')">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        
                    </div>
                    <div class="d-flex justify-content-center">
                        @if ($posts->onFirstPage())
                            <button class="btn btn-secondary" disabled>Trước</button>
                        @else
                            <a href="{{ $posts->previousPageUrl() }}" class="btn btn-primary">Trước</a>
                        @endif

                        <span class="mx-2">Trang {{ $posts->currentPage() }} / {{ $posts->lastPage() }}</span>

                        @if ($posts->hasMorePages())
                            <a href="{{ $posts->nextPageUrl() }}" class="btn btn-primary">Tiếp</a>
                        @else
                            <button class="btn btn-secondary" disabled>Tiếp</button>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
