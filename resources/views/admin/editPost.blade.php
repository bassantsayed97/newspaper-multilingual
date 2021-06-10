@extends('layouts.admin_layout')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit post</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit post</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?php

use App\Models\Category_ar;
use App\Models\Category_en;

$cat = new Category_en;
$cats_en = $cat->all();
$cat = new Category_ar;
$cats_ar = $cat->all();
?>
    <div style="padding-top:10px; padding-left:200px ;" class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-3">
                <div style="width: 200px;" class="row">
                <form method="POST" action="{{route('posts.update',$post->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                        <div style="width: 600px;" class="form-group col-md-6">
                       
                            <label for="first_name">Post Title En</label>
                            <input type="text" class="form-control"  value="{{$post['Post_en']['title_en']}}" name="title_en" placeholder="Enter Post Title English">
                            <label class="text-danger"> {{$errors->first("title_en")}}</label>
                         
                          </div>
                  
                        <div style="width: 600px;" class="form-group col-md-6">
                        <div class="text-right">
                            <label  >عنوان المنشور</label>
                        </div>
                            <input type="text" class="form-control text-right" value="{{$post['Post_ar']['title_ar']}}"  name="title_ar" placeholder="أدخل عنوان المنشور">
                            <label class="text-danger"> {{$errors->first("title_ar")}}</label>
                         
                          </div>  
                     </div>
                      
                      
                     <div class="form-row">
                        <div style="width: 600px;" class="form-group col-md-6">
                      
                            <label for="note">Content En</label>
                            <textarea class="form-control" rows="3" value="{{$post['Post_en']['body_en']}}" name="body_en" id="note" placeholder="Enter body of post ..."></textarea>
                            <label class="text-danger"> {{$errors->first("body")}}</label>
                        </div>
                        <div style="width: 600px;" class="form-group col-md-6">
                           <div class="text-right">
                            <label class="text-right">محتوي المنشور</label>
                            </div>
                            <textarea class="form-control text-right" rows="3" value="{{$post['Post_ar']['body_ar']}}" name="body_ar" id="note" placeholder=" ...ادخل محتوى المنشور"></textarea>
                            <label class="text-danger"> {{$errors->first("body")}}</label>
                        </div>

                     </div>

                     <div class="form-row">
              <div style="width: 600px;" class="form-group col-md-6">
                <label>Category Name</label>
                <select class="form-control" name="categoryEN[]" multiple >
                  <option disabled selected>Please Select Category</option>
                  @foreach($cats_en as $cat)
                  <option value="{{$cat['id']}}">{{$cat["name"]}}</option>
                  @endforeach
                </select>
                <label class="text-danger"> {{$errors->first("category[]")}}</label>

              </div>
              <div style="width: 600px;" class="form-group col-md-6">
                <div class="text-right">
                <label>اسم الفئه</label>
                </div>
                <select class="form-control text-right" name="categoryAR[]" multiple>
                  <option disabled selected>ادخل اسم الفئه</option>
                  @foreach($cats_ar as $cat)
                  <option value="{{$cat['id']}}">{{$cat["name"]}}</option>
                  @endforeach
                </select>
                <label class="text-danger"> {{$errors->first("category[]")}}</label>

              </div>

            </div>

                        <div class="form-group">
                            <label for="note">Post Image</label>
                            <input type="file" class="form-control"  name="image">
                            <label class="text-danger"> {{$errors->first("image")}}</label>
                        </div>
                       
                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
<br><br><br><br>

                    </form>
                </div>
            </div>
     
        </div>
    </div>


    @endsection('content')