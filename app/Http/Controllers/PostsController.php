<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\category_ar;
use App\Models\category_en;
use App\Models\category_post_ar;
use App\Models\category_post_en;
use App\Models\Posts;
use App\Models\Post_ar;
use App\Models\Post_en;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cat_post = new category_post_en;
        $cats_post_en = $cat_post->all();
        //  dd($cats_post_en);
        $cat_post = new category_post_ar;
        $cats_post_ar = $cat_post->all();



        $cat = new category_en;
        $cats_en = $cat->all();
        //  dd($cats_en[0]['name']);
        $cat = new category_ar;
        $cats_ar = $cat->all();

        $post_ar = new Post_ar();
        $posts_ar = $post_ar->all();
        $post_en = new Post_en();
        $posts_en = $post_en->all();
        $posts = Posts::all();

        $post_cats = [];
        foreach ($posts_en as $post) {
            foreach ($cats_post_en as $cat) {
               
                if ($post->id == $cat->post_id) {
                    foreach ($cats_en as $cat_name) {

                        if ($cat_name->id == $cat->category_id) {
                             
                            $post_cats[$cat['post_id']] = $cat_name['name'];
                        }
                    }
                }
            }
        }
        foreach ($posts_ar as $post) {
            foreach ($cats_post_ar as $cat) {
               
                if ($post->id == $cat->post_id) {
                    foreach ($cats_ar as $cat_name) {

                        if ($cat_name->id == $cat->category_id) {
                            
                            $post_cats[$cat['post_id']] = $cat_name['name'];
                        }
                    }
                }
            }
        }

        return view('admin.allposts', ["posts" => $posts, "cats_en" => $cats_en, "cats_ar" => $cats_ar, "posts_ar" => $posts_ar, "posts_en" => $posts_en, "post_cats" => $post_cats]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add_post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $posts = new  Posts();
        $posts_ar = new Post_ar;
        $posts_en = new Post_en;

        // dd( $posts);
        $posts->setConnection('mysql');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('postimg/'), $filename);
            $filename = 'postimg/' . $filename;
        }
        $posts->image = $filename;
        $user_id = Auth::id();
        //  dd($user_id);
        $posts->user_id = $user_id;
        $posts->save();

        $posts_en->setConnection('mysql1');
        $posts_en = $posts->post_en()->create([
            "title" => $request["title_en"],
            "body" => $request["body_en"],
        ]);
        $posts_en->categoryEN()->attach($request["categoryEN"]);
        // dd($request["categoryEN"]);
        // dd($posts_en);
        $posts_ar->setConnection('mysql2');
        $posts_ar = $posts->post_ar()->create([
            "title" => $request["title_ar"],
            "body" => $request["body_ar"],
        ]);
        $posts_ar->categoryAR()->attach($request["categoryAR"]);
// dd($posts_ar);
        return redirect(route("posts.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show(Posts $post)
    {

        $post_ar = new Post_ar();
        $posts_ar = $post_ar->find($post->id);
        $post_en = new Post_en();
        $posts_en = $post_en->find($post->id);
        //dd($posts_ar);
        return view("admin.showPost", ["post" => $post, "posts_ar" => $posts_ar, "posts_en" => $posts_en]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit(Posts $post)
    {

        $post_ar = new Post_ar();
        $posts_ar = $post_ar->find($post->id);
        $post_en = new Post_en();
        $posts_en = $post_en->find($post->id);
        // dd($posts_ar);
        return view("admin.editPost", ["post" => $post, "posts_ar" => $posts_ar, "posts_en" => $posts_en]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posts $post)
    {

        // dd( $post);
        $post->setConnection('mysql');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('postimg/'), $filename);
            $filename = 'posrtimg/' . $filename;
        }
        $user_id = Auth::id();
        $post->update([

            "image" => $filename,
            "user_id" => $user_id
        ]);

         // dd($user_id);


        $post->post_en()->update([
            "title" => $request["title_en"],
            "content" => $request["content_en"],

        ]);
//dd($post);
        // if($request["categoryEN"])
        // {
        //     $post->categoryEN()->detach();
        
        //     $post->categoryEN()->attach($request["categoryEN"]);
        // }

        $post->post_ar()->update([
            "title" => $request["title"],
            "body" => $request["body"],

        ]);
       
        return redirect(route("posts.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posts $post)
    {
        $post->delete();
        return redirect(route("posts.index"));
    }
}
