@extends('layouts.home_layout')
      
@section('main')
<?php
use App\Models\user;
$user=new user;
$users=$user->all();

use App\Models\Category;
$categories= Category::all();
use App\Models\category_en;
$category_en= category_en::all();
use App\Models\category_ar;
$category_ar= category_ar::all();
// use App\Models\Posts;
// $posts= Posts::all();
//Posts(::with('Post_en','Post_ar')->where('id','<',26)->get())

    
?>
<?php
   use App\Models\Post_ar;
   $post_ar=Post_ar::all();
   use App\Models\Post_en;
   $post_en= Post_en::select('*')->where('id','<',20)->get();
//$post_en= Post_en::select('*')->where('id','<',20)->get();
   $top_Viewedar=Post_ar::all();
   
   $top_Vieweden= Post_en::all();
   
   $Most_Viewedar=Post_ar::all();
   
   $Most_Vieweden= Post_en::all();

?>
<section id="feature_news_section" class="feature_news_section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="feature_article_wrapper">
                    <div class="feature_article_img">
                        <img class="img-responsive top_static_article_img" src="front/img/feature-top.jpg"
                             alt="feature-top">
                    </div>
                    <!-- feature_article_img -->

                    <div class="feature_article_inner">
                        <div class="tag_lg red"><a href="category.html">Hot News</a></div>
                        <div class="feature_article_title">
                            <h1><a href="single.html" target="_self">Chevrolet car-saving technology delivers </a></h1>
                        </div>
                        <!-- feature_article_title -->

                        <div class="feature_article_date"><a href="#" target="_self">Stive Clark</a>,<a href="#"
                                                                                                         target="_self">Aug
                            4, 2015</a></div>
                        <!-- feature_article_date -->

                        <div class="feature_article_content">
                            In a move to address mounting concerns about security on Android, Google and Samsung are
                            now issuing.
                        </div>
                        <!-- feature_article_content -->

                        <div class="article_social">
                            <span><i class="fa fa-share-alt"></i><a href="#">424</a>Shares</span>
                            <span><i class="fa fa-comments-o"></i><a href="#">4</a>Comments</span>
                        </div>
                        <!-- article_social -->

                    </div>
                    <!-- feature_article_inner -->

                </div>
                <!-- feature_article_wrapper -->

            </div>
    <div class="row">
        @if($try=='en')
        @foreach ($post_en as $item)
            <div class="col-md-5" style="margin-bottom: 3%">
                <div class="feature_static_wrapper">
                    <div class="feature_article_img">
                        <img class="img-responsive" width="450" style="height: 270px" src="{{URL::to('/') }}/{{$image[$loop->index]}}" alt="{{ $item->title }}">
                    </div>
                    <!-- feature_article_img -->

                    <div class="feature_article_inner">
                        <div class="tag_lg purple"><a href="category.html">Top Viewed</a></div>
                        <div class="feature_article_title">
 <h1><a href="{{route('post.show',$item->id)}}
">{{$item->title}} </a></h1>
                        </div>
                        <!-- feature_article_title -->

  <div class="feature_article_date"><a href=""  >ddd</a>, {{ date('F j,Y',strtotime( $item->created_at )) }}   </div>
                        <!-- feature_article_date -->

                        <div class="feature_article_content">
                        {{$item->body}}
                        </div>
                        <!-- feature_article_content -->

                        <div class="article_social">
                            
                            <span><i class="fa fa-comments-o"></i><a href="#">ssss</a>Comments</span>
                        </div>
                        <!-- article_social -->

                    </div>
                    <!-- feature_article_inner -->

                </div>
                <!-- feature_static_wrapper -->

            </div>
            <!-- col-md-5 -->
            
         @endforeach
         @else
         <div class="row">
       
        @foreach ($post_ar as $item)
            <div class="col-md-5" style="margin-bottom: 3%">
                <div class="feature_static_wrapper">
                    <div class="feature_article_img">
                        <img class="img-responsive" width="450" style="height: 270px" src="{{URL::to('/') }}/{{$image[$loop->index]}}" alt="{{ $item->title }}">
                    </div>
                    <!-- feature_article_img -->

                    <div class="feature_article_inner">
                        <div class="tag_lg purple"><a href="category.html">Top Viewed</a></div>
                        <div class="feature_article_title">
 <h1><a href="{{route('post.show',$item['id'])}}">{{$item->title}} </a></h1>
                        </div>
                        <!-- feature_article_title -->

  <div class="feature_article_date"><a href=""  >ddd</a>, {{ date('F j,Y',strtotime( $item->created_at )) }}   </div>
                        <!-- feature_article_date -->

                        <div class="feature_article_content">
                        {{$item->body}}
                        </div>
                        <!-- feature_article_content -->

                        <div class="article_social">
                            
                            <span><i class="fa fa-comments-o"></i><a href="#">ssss</a>Comments</span>
                        </div>
                        <!-- article_social -->

                    </div>
                    <!-- feature_article_inner -->

                </div>
                <!-- feature_static_wrapper -->

            </div>
           @endforeach <!-- col-md-5 -->
         @endif
         </div>
        <!-- Row -->

    </div>
    <!-- container -->

</section>
<!-- Feature News Section -->
<section id="category_section" class="category_section">
<div class="container">
<div class="row">
<div class="col-md-8">
<div class="category_section mobile">
@if($try=='en')
    @foreach($category_en as $category)
     
    <div class="article_title header_purple">
        <h2><a href="">{{ $category->name }}</a></h2>
    </div>
    <!----article_title------>
    
    <div class="category_article_wrapper">
        <div class="row">
            <div class="col-md-6">
                <div class="top_article_img">
                    <a href=""><img class="img-responsive"
          src="{{URL::to('/') }}/{{$catimg[$loop->index]}}" alt="{{ $category->title }}">
                    </a>
                </div>
                <!----top_article_img------>
            </div>
            <div class="col-md-6">
                <span class="tag purple">{{ $category->name }}</span>

                <div class="category_article_title">
                    <h2><a href="" target="_self">{{$category->title }} </a></h2>
                </div>
                <!----category_article_title------>
  <div class="category_article_date"> <a href=""  ></a>, {{ date('F j,Y',strtotime( $category->created_at )) }}</div>
                <!----category_article_date------>
                <div class="category_article_content">
                    {{ $category->body}}
                </div>
                <!----category_article_content------>
                <div class="media_social">
                     
                    <span><i class="fa fa-comments-o"></i><a href="#">110</a> Comments</span>
                </div>
                <!----media_social------>
            </div>
        </div>
    </div>
 
 
    @endforeach
       @else
       @foreach($category_ar as $category)
     
     <div class="article_title header_purple">
         <h2><a href="">{{ $category->name }}</a></h2>
     </div>
     <!----article_title------>
     
     <div class="category_article_wrapper">
         <div class="row">
             <div class="col-md-6">
                 <div class="top_article_img">
                     <a href=""><img class="img-responsive"
           src="{{URL::to('/') }}/{{$catimg[$loop->index]}}" alt="{{ $category->title }}">
                     </a>
                 </div>
                 <!----top_article_img------>
             </div>
             <div class="col-md-6">
                 <span class="tag purple">{{ $category->name }}</span>
 
                 <div class="category_article_title">
                     <h2><a href="" target="_self">{{$category->title }} </a></h2>
                 </div>
                 <!----category_article_title------>
   <div class="category_article_date"> <a href=""  ></a>, {{ date('F j,Y',strtotime( $category->created_at )) }}</div>
                 <!----category_article_date------>
                 <div class="category_article_content">
                     {{ $category->body}}
                 </div>
                 <!----category_article_content------>
                 <div class="media_social">
                      
                     <span><i class="fa fa-comments-o"></i><a href="#">110</a> Comments</span>
                 </div>
                 <!----media_social------>
             </div>
         </div>
     </div>
     @endforeach
    @endif
</div>
@if($try=='en')
    @foreach ($Most_Vieweden as $item)
<div class="card" style="width: 18rem;">
  <img src="{{URL::to('/') }}/{{$image[$loop->index]}}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{ $item->title }}</h5>
   
    <a href="#" class="btn btn-primary">reed more</a>
    <br> </br>
  </div>
</div>
@endforeach
@else
@foreach ($Most_Viewedar as $item)
<div class="card" style="width: 18rem;">
  <img src="{{URL::to('/') }}/{{$image[$loop->index]}}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title text-right">{{ $item->title }}</h5>
   
    <a href="#" class="btn btn-primary">قراة المزيد</a>
    <br> </br>
  </div>
</div>
@endforeach
@endif
<!-- Mobile News Section -->

 </div>
<!-- Left Section -->
<div class="col-md-4">
<div class="widget">
    <div class="widget_title widget_black">
        <h2><a href="#">Most Viewed</a></h2>
    </div>

    @if($try=='en')
    @foreach ($Most_Viewed as $item)


    <div class="media">
        <div class="media-left">
            <a href="">
                <img class="media-object" src="{{URL::to('/') }}/{{$image[$loop->index]}}" alt="{{ $item->title }}"></a>
        </div>
        <div class="media-body">
            <h3 class="media-heading">
                <a href="">{{ $item->title }}</a>
            </h3> <span class="media-date">
                <a href="#">{{ date('j F -y',strtotime($item->created_at)) }}</a>,  by:
                 <a href=""></a></span>

            <div class="widget_article_social">
                
                <span>
                    <a href="single.html" target="_self"><i class="fa fa-comments-o"></i>105</a> Comments
                </span>
            </div>
        </div>
    </div>

    @endforeach
    @else
    @foreach ($Most_Viewed as $item)


<div class="media">
    <div class="media-left">
        <a href="">
            <img class="media-object" src="{{URL::to('/') }}/{{$image[$loop->index]}}" alt="{{ $item->title }}"></a>
    </div>
    <div class="media-body">
        <h3 class="media-heading">
            <a href="">{{ $item->title }}</a>
        </h3> <span class="media-date">
            <a href="#">{{ date('j F -y',strtotime($item->created_at)) }}</a>,  by:
             <a href=""></a></span>

        <div class="widget_article_social">
            
            <span>
                <a href="single.html" target="_self"><i class="fa fa-comments-o"></i>105</a> Comments
            </span>
        </div>
    </div>
</div>
    @endforeach
     @endif
    <p class="widget_divider"><a href="" target="_self">More News&nbsp;&raquo;</a></p>
</div>
<!-- Popular News -->
<div class="widget hidden-xs m30">
    <img class="img-responsive adv_img" src="{{ asset('front/img/right_add1.jpg')}}" alt="add_one">
    <img class="img-responsive adv_img" src="{{ asset('front/img/right_add2.jpg')}}" alt="add_one">
    <img class="img-responsive adv_img" src="{{ asset('front/img/right_add3.jpg')}}" alt="add_one">
    <img class="img-responsive adv_img" src="{{ asset('front/img/right_add4.jpg')}}" alt="add_one">
</div>
<!-- Advertisement -->


<!-- Advertisement -->

 
<!-- Advertisement -->
<div class="widget m30">
    <div class="widget_title widget_black">
        <h2><a href="#">Most Commented</a></h2>
    </div>
    @if($try=='en')
    @foreach($top_Vieweden as $item)
    <div class="media">
        <div class="media-left">
            <a href=""><img class="media-object" src="{{URL::to('/') }}/{{$image[$loop->index]}}" alt="{{ $item->title }}"></a>
        </div>
        <div class="media-body">
            <h3 class="media-heading">
                <a href="" >{{ $item->title }}</a>
            </h3>

            <div class="media_social">
                <span><i class="fa fa-comments-o"></i><a href="#">101</a> Comments</span>
            </div>
        </div>
    </div>
    @endforeach
    @else
    @foreach($top_Viewedar as $item)
    <div class="media">
        <div class="media-left">
            <a href=""><img class="media-object" src="{{URL::to('/') }}/{{$image[$loop->index]}}" alt="{{ $item->title }}"></a>
        </div>
        <div class="media-body">
            <h3 class="media-heading">
                <a href="" >{{ $item->title }}</a>
            </h3>

            <div class="media_social">
                <span><i class="fa fa-comments-o"></i><a href="#">101</a> Comments</span>
            </div>
        </div>
    </div>
    @endforeach
    @endif
    <p class="widget_divider"><a href="#" target="_self">More News&nbsp;&nbsp;&raquo; </a></p>
</div>
<!-- Most Commented News -->

<div class="widget m30">
    <div class="widget_title widget_black">
        <h2><a href="#">Editor Corner</a></h2>
    </div>
    <div class="widget_body"><img class="img-responsive left" src="{{ asset('front/img/editor.jpg')}}"
                                  alt="Generic placeholder image">

        <p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C
            users after installed base benefits. Dramatically visualize customer directed convergence without</p>

        <p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C
            users after installed base benefits. Dramatically visualize customer directed convergence without
            revolutionary ROI.</p>
        <button class="btn pink">Read more</button>
    </div>
</div>
<!-- Editor News -->



<!--Advertisement-->
</div>
<!-- Right Section -->

</div>
<!-- Row -->

</div>
<!-- Container -->

</section>
<!-- Category News Section -->

<section id="video_section" class="video_section">
    <div class="container">
        <div class="well">
            <div class="row">
                <div class="col-md-6">
                    <div class="embed-responsive embed-responsive-4by3">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/MJ-jbFdUPns"
                                frameborder="0" allowfullscreen></iframe>
                    </div>
                    <!-- embed-responsive -->

                </div>
                <!-- col-md-6 -->

                <div class="col-md-3">
                    <div class="embed-responsive embed-responsive-4by3">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/h5Jni-vy_5M"></iframe>
                    </div>
                    <!-- embed-responsive -->

                    <div class="embed-responsive embed-responsive-4by3 m16">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/wQ5Gj0UB_R8"></iframe>
                    </div>
                    <!-- embed-responsive -->

                </div>
                <!-- col-md-3 -->

                <div class="col-md-3">
                    <div class="embed-responsive embed-responsive-4by3">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/UPvJXBI_3V4"></iframe>
                    </div>
                    <!-- embed-responsive -->

                    <div class="embed-responsive embed-responsive-4by3 m16">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/DTCtj5Wz6BM"></iframe>
                    </div>
                    <!-- embed-responsive -->

                </div>
                <!-- col-md-3 -->

            </div>
            <!-- row -->

        </div>
        <!-- well -->

    </div>
    <!-- Container -->

</section>
<!-- Video News Section -->
        @endsection