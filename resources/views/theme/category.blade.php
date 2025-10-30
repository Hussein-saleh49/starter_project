@extends('theme.master')

@section('category-active', 'active')
@section('web-title', 'Category')
@section('hero-size', 'hero-banner hero-banner--sm')
@section('blog-title', $category_name )
@section('page',  $category_name)

@section('content')
<!--================ Start Blog Post Area =================-->
<section class="blog-post-area section-margin">
    <div class="container">
        <div class="row">
            <!-- Start Left Blog Posts -->
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="row">
                    @if ($blogs->count() > 0)
                        @foreach ($blogs as $blog)
                            <div class="col-md-6 mb-4">
                                <div class="single-recent-blog-post card-view">
                                    <div class="thumb">
                                        <img class="card-img rounded-0"
                                             src="{{ asset("storage/blogs/$blog->image") }}"
                                             alt="{{ $blog->name }}"
                                             style="width:100%; height:250px; object-fit:cover;">
                                        <ul class="thumb-info">
                                            <li><a href="#"><i class="ti-user"></i>{{ $blog->user->name }}</a></li>
                                            <li><a href="#"><i class="ti-themify-favicon"></i>#</a></li>
                                        </ul>
                                    </div>
                                    <div class="details mt-20">
                                        <a href="{{ route("blogs.show",$blog->id) }}">
                                            <h3>{{ $blog->name }}</h3>
                                        </a>
                                        <p>{{ Str::limit($blog->description, 120) }}</p>
                                        <a class="button" href="{{ route("blogs.show",$blog) }}">Read More <i class="ti-arrow-right"></i></a>
                                        
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-center w-100">No blogs found in this category.</p>
                    @endif
                </div>

                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        {{ $blogs->links() }}
                    </div>
                </div>
            </div>
            <!-- End Left Blog Posts -->

            <!-- Sidebar (don’t wrap it again in col-lg-4, it’s already inside) -->
            @include('theme.parials.sidebar')
        </div>
    </div>
</section>
<!--================ End Blog Post Area =================-->
@endsection
