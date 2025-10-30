 @php
     $categories = App\Models\Category::take(3)->get();
     $blogs = collect();
     if (Auth::check()) {
         $blogs = App\Models\Blog::where('user_id', Auth::user()->id)->get();
     }

 @endphp
 <!--================Header Menu Area =================-->
 <header class="header_area">
     <div class="main_menu">
         <nav class="navbar navbar-expand-lg navbar-light">
             <div class="container box_1620">
                 <!-- Brand and toggle get grouped for better mobile display -->
                 <a class="navbar-brand logo_h" href="{{ route('theme.index') }}"><img
                         src="{{ asset('assets') }}/img/logo.png" alt=""></a>
                 <button class="navbar-toggler" type="button" data-toggle="collapse"
                     data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                     aria-label="Toggle navigation">
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                 </button>
                 <!-- Collect the nav links, forms, and other content for toggling -->
                 <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                     <ul class="nav navbar-nav menu_nav justify-content-center">
                         <li class="nav-item @yield('home-active')"><a class="nav-link"
                                 href="{{ route('theme.index') }}">Home</a></li>
                         <li class="nav-item submenu dropdown @yield('category-active')">
                             <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                 aria-haspopup="true" aria-expanded="false">Categories</a>
                             @if (count($categories) > 0)
                                 <ul class="dropdown-menu">
                                     @foreach ($categories as $category)
                                         <li class="nav-item "><a class="nav-link"
                                                 href="{{ route('theme.category', $category->name) }}">{{ $category->name }}</a>
                                         </li>
                                     @endforeach
                                 </ul>
                             @endif
                         </li>
                         <li class="nav-item @yield('contact-active')"><a class="nav-link"
                                 href="{{ route('theme.contact') }}">Contact</a></li>
                     </ul>

                     <!-- Add new blog -->
                     @if (Auth::check())
                         <a href="{{ route('blogs.create') }}" class="btn btn-sm btn-primary mr-2">Add New</a>
                     @endif

                     <!-- End - Add new blog -->

                     <ul class="nav navbar-nav navbar-right navbar-social">
                         @if (Auth::check())
                             <li class="nav-item submenu dropdown">
                                 <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"
                                     role="button" aria-haspopup="true"
                                     aria-expanded="false">{{ Auth::user()->name }}</a>
                                 <ul class="dropdown-menu">
                                     @if (count($blogs) > 0)
                                         @php
                                             $firstBlog = $blogs->first();
                                         @endphp

                                             <li class="nav-item">
                                                   <a class="nav-link" href="{{ route('blogs.show', ['user' => Auth::id(), 'blog' => $firstBlog->id]) }}">My
                                                     Blogs</a>
                                             </li>
                                       
                                     @else
                                         <li><span class="dropdown-item text-muted">No blogs yet</span></li>
                                     @endif

                                     <li class="nav-item">
                                         <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                             @csrf
                                             <button type="submit"
                                                 class="nav-link border-0 bg-transparent w-100 text-start"
                                                 style="color: #333; padding: 8px 16px;">
                                                 Logout
                                             </button>
                                         </form>
                                     </li>
                                 </ul>

                             </li>
                         @else
                             <a href="{{ route('register') }}" class="btn btn-sm btn-warning">Register / Login</a>
                         @endif
                     </ul>
                 </div>
             </div>
         </nav>
     </div>
 </header>
 <!--================Header Menu Area =================-->
