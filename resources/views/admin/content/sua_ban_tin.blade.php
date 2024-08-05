@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Cập nhật bản tin
            </h1>
        </section>
        <section class="content">
            <div class="row container-fluid">
                <div class="col-md-11">
                    <div class="box box-primary">
                        <form method="POST" action="{{ route('xu_ly_sua_ban_tin', $posts->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tiêu đề</label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title', $posts->title) }}"
                                        placeholder="Tiêu đề...">
                                    @error('title')
                                        <label class="text-danger">{{ $message }}</label>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nôị dung</label>
                                    <input type="text" class="form-control" name="content" value="{{ old('title', $posts->content) }}"
                                        placeholder="Nôị dung...">
                                    @error('content')
                                        <label class="text-danger">{{ $message }}</label>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Ảnh</label>
                                    <input type="file" name="image" value="{{ old('image') }}"><br>
                                    <img class="mb-3" width="200px" src="{{ \Storage::url($posts->image) }}" alt=""><br>
                                    @error('image')
                                        <label class="text-danger">{{ $message }}</label>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="catelory_id">Chuyên mục</label>
                                    <select class="form-control" name="catelory_id" id="catelory_id">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
