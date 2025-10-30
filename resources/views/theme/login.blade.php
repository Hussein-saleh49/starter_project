  @extends('theme.master')
    @section('content')
    @section('web-title', 'login')
    @section('hero-size', 'hero-banner hero-banner--sm')
    @section('blog-title', 'Login')
    @section('page', 'login')
 <!-- ================ contact section start ================= -->
  <section class="section-margin--small section-margin">
    <div class="container">
      <div class="row">
        <div class="col-6 mx-auto">
          <form action="{{ route("login") }}" class="form-contact contact_form"  method="post"  novalidate="novalidate">
            @csrf
            <div class="form-group">
              <input class="form-control border" name="email" id="email" type="email" value="{{ old("email") }}" placeholder="Enter email address">
              <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div class="form-group">
              <input class="form-control border" name="password" id="name" type="password" placeholder="Enter your password">
              <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <div class="form-group text-center text-md-right mt-3">
              <a href="{{ route("register") }}"> Sign Up instead ?</a>
              <button type="submit" class="button button--active button-contactForm">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  @endsection
	<!-- ================ contact section end ================= -->

 