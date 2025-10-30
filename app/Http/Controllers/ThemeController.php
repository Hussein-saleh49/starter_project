<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    //
    public function index(){
        $blogs = Blog::latest()->paginate(4);
        $recentblogs = Blog::latest()->get()->take(5);

        return view("theme.index",compact("blogs","recentblogs"));
    }
    public function category($name){
        $category_name = Category::where("name",$name)->first()->name;
        $category_id = category::where("name",$name)->first()->id;
         $blogs = Blog::where("category_id",$category_id)->paginate(4);
        return view("theme.category",compact("blogs","category_name"));
    }
    public function contact(){
        return view("theme.contacts");
    }
    
   
}
