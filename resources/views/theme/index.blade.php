@extends('theme.master')
@section('content')
@section('home-active', 'active')
@section('web-title', 'Home')

<!--================Hero Banner start =================-->  
    <section class="mb-30px">
      <div class="container">
        <div class="hero-banner">
          <div class="hero-banner__content">
            <h3>Tours & Travels</h3>
            <h1>Amazing Places on earth</h1>
            <h4>December 12, 2018</h4>
          </div>
        </div>
      </div>
    </section>
    <!--================Hero Banner end =================-->  

<!--================ Blog slider start =================-->
<section>
    <div class="container">
        @if(count($recentblogs) > 0)
            <div class="owl-carousel owl-theme blog-slider">
                @foreach($recentblogs as $blog)
                    <div class="card blog__slide text-center">
                        <div class="blog__slide__img">
                            <img class="card-img rounded-0" src="{{ asset("storage/blogs/$blog->image") }}" alt="" style="width:100%; height:300px; object-fit:cover;">
                        </div>
                        
                        <div class="blog__slide__content">
                            <a class="blog__slide__label" href="{{ route("theme.category",$blog->category->name) }}">{{ $blog->category->name }}</a>
                            <h3><a href="{{ route("blogs.show",$blog) }}">{{ $blog->name }}</a></h3>
                            <p>{{ $blog->created_at->format("d M Y") }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>



<!--================ Start Blog Post Area =================-->
<section class="blog-post-area section-margin mt-4">
    <div class="container">
        <div class="row">


            
            <div class="col-lg-8">
                @if (count($blogs) > 0)
                   @foreach ($blogs as $blog)
               
                <div class="single-recent-blog-post">
                    <div class="thumb">
                        <img class="img-fluid" style= "width:100%; height:250px; object-fit:cover;"  src=" {{ asset("storage/Blogs/$blog->image") }}" alt="">
                        <ul class="thumb-info">
                            <li><a href="#"><i class="ti-user"></i>{{ $blog->user->name }}</a></li>
                            <li><a href="#"><i class="ti-notepad"></i>{{ $blog->user->created_at->format(" d M Y") }}</a></li>
                            <li><a href="#"><i class="ti-themify-favicon"></i>{{ $blog->comments->count() }}</a></li>
                        </ul>
                    </div>
                    <div class="details mt-20">
                        <a href="{{ route("blogs.show",$blog->id) }}">
                            <h3>{{ $blog->name }}.</h3>
                        </a>
                        <p>{{ $blog->description }}
                            cattle were fruitful lights. Given let have, lesser their made him above gathered dominion
                            sixth. Creeping deep said can't called second. Air created seed heaven sixth created living
                        </p>
                        <a class="button" href="{{ route("blogs.show",$blog) }}">Read More <i class="ti-arrow-right"></i></a>
                    </div>
                </div>
                  @endforeach 
                @endif

                

                <div class="row">
                    <div class="col-lg-12">
                        {{ $blogs->links() }}    
                    </div>
                </div>
                
            </div>

            <!-- Start Blog Post Siddebar -->
            @include("theme.parials.sidebar")
            <!-- End Blog Post Siddebar -->
        </div>
</section>
<!--================ End Blog Post Area =================-->
@endsection
