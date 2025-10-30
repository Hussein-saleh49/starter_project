@extends('theme.master')

@section('web-title', 'Edit_blog')
@section('hero-size', 'hero-banner hero-banner--sm')
@section('blog-title', $blog->name)
@section('page', $blog->name)
@section('content')

    <!-- ================ contact section start ================= -->
    <section class="section-margin--small section-margin">
        <div class="container">
            <div class="row">
                <div class="col-12">
                  @if (session("status"))
                    <div class="alert alert-success"> {{ session("status") }}</div>
                    @endif
                    <form action="{{ route('blogs.update',$blog) }}" class="form-contact contact_form" method="POST"
                        enctype="multipart/form-data" novalidate="novalidate">

                        @csrf
                        @method("put")
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control border" name="name" id="name" type="text"
                                        value="{{ $blog->name }}" placeholder="Enter your blog title">
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <div class="form-group">
                                    <textarea class="form-control border" rows="5" name="description" id="description"
                                        placeholder="Enter blog description">{{ $blog->description }}</textarea>
                                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                </div>
                                <div class="form-group">
                                    <input class="form-control border" name="image" type="file">
                                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                                </div>
                            </div>

                            <div class="col-md-6">

                                <div class="form-group">

                                    <select class="form-control border" name="category_id" id="category_id">
                                        <option value="">-- Choose Category --</option>
                                        @if (count($categories) > 0)
                                        @foreach ($categories as $category )
                                            
                                        <option value="{{ $category->id }}" @if($category->id == $blog->category_id ) 
                                            selected
                                            @endif>{{ $category->name }}</option>
                                        @endforeach
                                            
                                        @endif
                                        
                                    </select>
                                    
                                    <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center text-md-right mt-4">
                            <button type="submit" class="button button--active button-contactForm">
                                Edit Blog
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->

@endsection
