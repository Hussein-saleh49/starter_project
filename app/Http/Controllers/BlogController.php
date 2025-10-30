<?php
namespace App\Http\Controllers;

use App\Http\Requests\AddBlog;
use App\Http\Requests\EditRequest;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth")->only(['create', "show", "edit"]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
      
        $categories = Category::get();
        return view("theme.blog.create", compact("categories"));
      

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddBlog $request)
    {
        //
        $data       = $request->validated();
        $image      = $request->file("image");
        $image_name = time() . "-" . $image->getClientOriginalName();
        $image->storeAs("blogs", $image_name, "public");

        $data["image"]   = $image_name;
        $data["user_id"] = Auth::user()->id;

        Blog::create($data);

        return back()->with("status", " Your Blog is added successfully");

    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
      

        return view("theme.single_blog", compact("blog"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        //
        if (Auth::check() && $blog->user_id == Auth::user()->id) {

            $categories = Category::all();
            return view("theme.blog.edit", compact("blog", "categories"));
        } else {
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditRequest $request, Blog $blog)
    {
        //
        $data = $request->validated();

        if ($request->hasFile("image")) {
            //delete old
            Storage::disk('public')->delete("blogs/$blog->image");

            $image      = $request->file("image");
            $image_name = time() . "-" . $image->getClientOriginalName();
            $image->storeAs("blogs", $image_name, "public");

            $data["image"] = $image_name;

        }

        $blog->update($data);

        return back()->with("status", " Your Blog is updated successfully");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
        
        if (Auth::check() && $blog->user_id == Auth::user()->id) {
            if ($blog->image && Storage::disk("public")->exists("blogs/$blog->image")) {
                Storage::disk('public')->delete("blogs/$blog->image");

            }
            $blog->delete();
            return redirect()->route("theme.index")->with("status", "your blog is deleted successfully");
        }
        abort(403);

    }
}
