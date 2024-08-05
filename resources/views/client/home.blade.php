@extends('client.layouts.master')

@section('content')
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('success') || session('error'))
                var alertElement = document.createElement('div');
                alertElement.className =
                    'alert {{ session('success') ? 'alert-success' : 'alert-danger' }} alert-dismissible fade show';
                alertElement.setAttribute('role', 'alert');
                alertElement.innerHTML = `
                {{ session('success') ?? session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            `;
                document.body.insertBefore(alertElement, document.body.firstChild);

                setTimeout(function() {
                    alertElement.remove();
                }, 3000);
            @endif
        });
    </script>
@endsection
<div class="container-fluid py-3">
    <div class="container">
        @foreach ($categories as $category)
            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                <h3 class="m-0">{{ $category->name }}</h3>
                <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
            </div>
            <div class="owl-carousel owl-carousel-2 carousel-item-3 position-relative">
                @foreach ($category->posts as $post)
                <div class="position-relative overflow-hidden" style="height: 300px;">
                    <img width="100px" src="{{ \Storage::url($post->image) }}" alt="">
                        <div class="overlay">
                            <div class="mb-1" style="font-size: 13px;">
                                <a class="text-white" href="">{{ $category->name }}</a>
                                <span class="px-1 text-white">/</span>
                                <a class="text-white" href="">{{ $post->created_at->format('F d, Y') }}</a>
                            </div>
                            <a class="h4 m-0 text-white" href="{{ route('chi_tiet', $post->id) }}">{{ $post->title}}</a>
                        </div>
                    </div>
                @endforeach
            </div><br>
        @endforeach
    </div>
</div>
@endsection
