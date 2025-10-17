<!--================Hero Banner start =================-->
<section class="mb-30px">
    <div class="container">
        <div class="@yield('hero-size')">
            <div class="hero-banner__content">
                
                <h1>@yield('blog-title')</h1>
                <nav aria-label="breadcrumb" class="banner-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('theme.index') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@yield("page") Page</li>
                    </ol>
                </nav>
                
            </div>
        </div>
    </div>
</section>
<!--================Hero Banner end =================-->
