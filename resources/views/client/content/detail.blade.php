@extends('client.layouts.master')

@section('content')
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- News Detail Start -->
                    <div class="position-relative mb-3">
                        <div class="overlay position-relative bg-light">
                            <img class="img-fluid w-50" src="{{ \Storage::url($posts->image) }}"
                                alt=""style="object-fit: cover;"><br>
                            <div class="mb-3">
                                <a href="">{{ $posts->catelory->name }}</a>
                                <span class="px-1">/</span>
                                <span>{{ $posts->created_at->format('F d, Y') }}</span>
                            </div>
                            <div>
                                <h3 class="mb-3">{{ $posts->title }}</h3>
                                <p>{{ $posts->content }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- News Detail End -->

                    <!-- Comment List Start -->
                        <div class="bg-light mb-3" style="padding: 30px;">
                            <h3 class="mb-4">{{ $commentCount }} bình luận</h3>
                            @foreach ($comments as $comments)
                            <div class="media mb-4">
                                <div class="media-body">
                                    <h6><a href="">{{ $comments->user->name }}</a> <small><i>{{ $comments->created_at->format('F d, Y') }}</i></small></h6>
                                    <p>{{ $comments->content }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    <!-- Comment List End -->

                    <!-- Comment Form Start -->
                    @auth
                        <div class="bg-light mb-3" style="padding: 30px;">
                            <h3 class="mb-4">Để lại bình luận</h3>
                            <form action="{{ route('comment.store', $posts->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="post_id" value="{{ $posts->id }}">
                                <div class="form-group">
                                    <label for="message">Nội dung</label>
                                    <textarea id="message" name="content" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                                @error('content')
                                    <label for="" class="text-danger">{{ $message }}</label>
                                @enderror
                                <div class="form-group mb-0">
                                    <input type="submit" value="Bình luận"
                                        class="btn btn-primary font-weight-semi-bold py-2 px-3">
                                </div>
                            </form>
                        </div>
                    @endauth
                    <!-- Comment Form End -->
                </div>
            </div>
        </div>
    </div>
@endsection
