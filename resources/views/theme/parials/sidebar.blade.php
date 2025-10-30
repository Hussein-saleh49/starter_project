@php
    use App\Models\Category;
    use App\Models\Blog;

    $categories = Category::all();
    $recentblogs = Blog::latest()->take(3)->get();
@endphp

<div class="col-lg-4 sidebar-widgets">
    <div class="widget-wrap">

      
        @if (session('success') && session('form_id') == 'sidebar')
            <div class="alert alert-success"> {{ session('success') }}</div>
        @endif

        <div class="single-sidebar-widget newsletter-widget mb-4">
            <form action="{{ route('subscribe') }}" method="POST">
                @csrf
                <h4 class="single-sidebar-widget__title mb-3">Subscribe to Newsletter</h4>
                <div class="form-group">
                    <input type="hidden" name="form" value="sidebar">
                    <input type="hidden" name="form_id" value="sidebar">

                    <input type="email" class="form-control mb-2" value="{{ old('email') }}" name="email"
                        placeholder="Enter your email">
                    @error('email', 'sidebar')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-2">Subscribe</button>
            </form>
        </div>

     
        @if ($categories->count() > 0)
            <div class="single-sidebar-widget post-category-widget mb-4">
                <h4 class="single-sidebar-widget__title mb-3">Categories</h4>
                <ul class="cat-list list-unstyled">
                    @foreach ($categories as $category)
                        <li class="d-flex justify-content-between border-bottom py-2">
                            <a href="{{ route('theme.category', $category->name) }}" class="text-decoration-none text-dark">
                                {{ $category->name }}
                            </a>
                            <p>{{ $category->blogs->count() }}</p>

                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        
        @if ($recentblogs->count() > 0)
            <div class="single-sidebar-widget popular-post-widget">
                <h4 class="single-sidebar-widget__title mb-3">Recent Posts</h4>

                <div class="popular-post-list">
                    @foreach ($recentblogs as $blog)
                        <div class="single-post-list d-flex mb-3 border-bottom pb-3">
                            <div class="thumb me-3">
                                <a href="{{ route('blogs.show', $blog) }}">
                                    <img src="{{ asset("storage/blogs/$blog->image") }}" alt="{{ $blog->name }}"
                                        class="rounded" width="80" height="80"
                                        style="object-fit: cover;">
                                </a>
                            </div>
                            <div class="details flex-grow-1">
                                <a href="{{ route('blogs.show', $blog) }}" class="text-decoration-none">
                                    <h6 class="fw-semibold mb-1 text-dark">{{ $blog->user->name }}</h6>
                                </a>
                                <small class="text-muted">
                                    <i class="bi bi-calendar-event"></i>
                                    {{ $blog->created_at->format('d M ') }}
                                </small>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>
