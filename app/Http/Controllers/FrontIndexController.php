<?php

namespace App\Http\Controllers;
use LaravelLocalization;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Posts;
use App\Models\Post_en;
use App\Models\Post_ar;
use App\Models\category_ar;
use App\Models\category_en;
class FrontIndexController extends Controller
{
    public function index(Request $request)
    {
        // $cat_en_ar=[];


     $categories= Category::all();
       
        $category_en= category_en::select(
            'id',
            'name_' . LaravelLocalization::getCurrentLocale() . ' as name',
            ); 
            $try=substr(url()->current(),22,2);
            // dd($try);
            //dd( $category_en);
        //   $new=[];
        //   $i=0;  
        //      foreach($category_en as $cat){
        //     $new[$i]=$cat['name'];
        //     $i++;
        //      }
        //      dd($new);
    // dd(url()->current());
        //
            $category_ar= category_ar::select(
             'id',
           'name_' . LaravelLocalization::getCurrentLocale() . ' as name');
        //    $new=json_decode($category_en,true);
        $newimg=[];
        foreach($categories as $cat){
       $newimg[]=$cat['image'];
        }
    
        $posts=Posts::all();

        $post_en= Post_en::select(
            'id',
            
            'title_' . LaravelLocalization::getCurrentLocale() . ' as title',
            'body_' . LaravelLocalization::getCurrentLocale() . ' as body',
        );
            // dd($post_en);
            $post_ar= Post_ar::select(
                'id',
                'title_' . LaravelLocalization::getCurrentLocale() . ' as title',
                'body_' . LaravelLocalization::getCurrentLocale() . ' as body',
            );
            $new=[];
             foreach($posts as $post){
            $new[]=$post['image'];
             }
            $Most_Viewed=Posts::all();
            $top_Viewed=Posts::all();
           return view('index',['image'=>$new,"posts"=>$posts,"post_en"=>$post_en,"post_ar"=>$post_ar,"categories"=>$categories, "category_en"=>$category_en,"category_ar"=>$category_ar ,'try'=>$try ,'catimg'=>$newimg , 'Most_Viewed'=>$Most_Viewed , 'top_Viewed'=>$top_Viewed]);          //  'body_' . LaravelLocalization::getCurrentLocale() . ' as body');
      
           
}
public function show($id)
{
    $url=substr(url()->current(),22,2);
    // return $id;    
    $posts_en=new Post_en;
    $posts_en=$posts_en->findorfail($id);
    //  return $posts_en; 
    $post_en=$posts_en['posts_id'];
    //  return $post_en;  
    // $posts_ar=new Post_ar;
    // $posts_ar=$posts_ar->findorfail($id);
    //  return $posts_ar;  
    $posts_ar=new Post_ar;
    // return $posts_ar;
    $posts_ar=$posts_ar->findorfail($id);
    return $posts_ar;
  
   $posts = Posts::all();
   foreach ($posts as $post) {
         if ($post->id == $post_en) {
         $post_img =$post['image'];    
         }}
    
 
//dd($post_img);
return view('singlepost',["posts_en"=>$posts_en, "post_img"=>$post_img,"url"=>$url]);

 //function Post($id){
    // $url=substr(url()->current(),22,2);
    // $posts_en=new post_en;
    // $posts_en=$posts_en->findorfail($id);
    // $posts_ar=new post_ar;
    // $posts_ar=$posts_ar->findorfail($id);
    // $image=[];
    // foreach($posts as $pt){
    //     $image[]=$pt['image'];
    //  }
    //  $posts= Posts::all();

    // $feedback = new Feedback;
   
    // $feedbacks=DB::table('feedback')
    // ->where('post_id', '=', $id)
    // ->get();

  //dd($feedbacks);
//  return view('singlepost',["posts_en"=>$posts_en,"posts"=>$posts,"posts_ar"=>$posts_ar,"feedbacks"=>$feedbacks,"url"=>$url,'image'=>$image]);

   

}


}