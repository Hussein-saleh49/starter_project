@extends('theme.master')
@section('category-active', 'active')
@section('web-title', 'Category')
@section('hero-size', 'hero-banner hero-banner--sm')
@section('blog-title', $blog->name)
@section('page', $blog->name)
@section('content')

    <!--================ Start Blog Post Area =================-->
    <section class="blog-post-area section-margin">
        <div class="container">
            <div class="row">
                <!-- Main Blog Details -->
                <div class="col-lg-8 mb-4">
                    @if (session('status'))
                        <div class="alert alert-success">{{ session('status') }}</div>
                    @endif
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                        <!-- Blog Image -->
                        <img src="{{ asset("storage/blogs/$blog->image") }}" alt="{{ $blog->name }}"
                            class="card-img-top img-fluid" style="object-fit: cover; max-height: 420px;">

                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h3 class="card-title mb-0">{{ $blog->name }}</h3>

                                @if (Auth::check() && $blog->user_id === Auth::id())
                                    <a href="{{ route('blogs.edit', $blog->id) }}"
                                        class="btn btn-warning btn-sm px-3 fw-semibold text-dark">
                                        <i class="bi bi-pencil-square me-1"></i> Edit
                                    </a>
                                    <form action="{{ route('blogs.destroy', $blog) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit"
                                            class="btn btn-danger btn-sm d-flex align-items-center px-3 fw-semibold shadow-sm">
                                            <i class="bi bi-trash3 me-1"></i> Delete
                                        </button>
                                    </form>
                                @endif
                            </div>

                            <div class="d-flex align-items-center text-muted small mb-3">
                                <img src="{{ asset('assets/img/avatar.png') }}" width="40" height="40"
                                    class="rounded-circle me-2" alt="">
                                <div>
                                    <strong>{{ $blog->user->name }}</strong><br>
                                    <span>{{ $blog->created_at->format('d M Y') }}</span>
                                </div>
                            </div>

                            <p class="card-text text-secondary" style="line-height: 1.8;">
                                {{ $blog->description }}
                            </p>
                        </div>
                    </div>

                    <!-- Comments Section -->
                    @if (Count($blog->comments) > 0)
                        
                    <div class="comments-area mt-5">
                        <h4 class="mb-4">{{ count($blog->comments) }}</h4>
                        @foreach ($blog->comments as  $comment)
                            
                        <div class="single-comment d-flex mb-4 p-3 border rounded-3">
                            <img src="{{ asset('assets/img/avatar.png') }}" class="rounded-circle me-3" width="50"
                            height="50" alt="">
                            <div>
                                <h6 class="mb-1">{{ $comment->name}}</h6>
                                <p class="text-muted small mb-1">{{ $comment->created_at->format(" d M Y") }}</p>
                                <p class="mb-0">{{ $comment->message }}</p>
                            </div>
                        </div>
                        
                        @endforeach
                        
                    </div>
                    @endif

                    <!-- Comment Form -->
                    <div class="comment-form mt-5">
                        @if (session('status'))
                            <div class=" alert alert-success">{{ session('status') }}</div>
                        @endif
                        <h4 class="mb-3">Leave a Reply</h4>
                        <form action="{{ route('comments.store') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <input type="hidden" name="blog_id" value={{ $blog->id }}>
                                <input type="hidden" name="form" value="comment">
                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                        placeholder="Enter Name">
                                    @error('name','comment')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                        placeholder="Enter Email">
                                    @error('email', 'comment')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <input type="text" name="subject" value="{{ old('subject') }}" class="form-control"
                                        placeholder="Subject">
                                    @error('subject', 'comment')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control" aria-valuemax="{{ old('message') }}" name="message" rows="5"
                                        placeholder="Message"></textarea>
                                    @error('message', 'comment')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary px-4 py-2 mt-2">Post Comment</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Sidebar -->
                @include('theme.parials.sidebar')
            </div>
        </div>
    </section>
@endsection
<!--================ End Blog Post Area =================-->
