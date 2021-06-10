@extends('layouts.admin_layout')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit categery</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit categery</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?php

use App\Models\category_en;
$category_en=new category_en;

 
  use App\Models\category_ar;
  $category_ar=new category_ar;

?>
  
   
    <div style="padding-top:10px; padding-left:400px ;" class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-3">
                <div style="width: 200px;" class="row">
                <form method="POST" action="{{route('category.update',$category)}}" enctype="multipart/form-data">
                    @csrf
                  

                   

                    <div class="row">
<div class="col-6">
<div  style="width: 300px;"  class="form-group">
                            <label for="first_name">Categery name En</label>
                            <input type="text" class="form-control" value="{{$category['category_en']['name']}}"  name="nameEN" placeholder="Enter Categery Name English">
                            <label class="text-danger"> {{$errors->first("nameEN")}}</label>
                          </div>
</div>
<div class="col-6">
<div  style="width: 300px;"  class="form-group">
                            <label for="first_name">Categery name Ar</label>
                            <input type="text" class="form-control"   value="{{$category['category_ar']['name']}}"  name="nameAR" placeholder="أدخل اسم الفئة">
                            <label class="text-danger"> {{$errors->first("nameAR")}}</label>
                          </div>
</div>
</div>



                            <label>Categery image</label>
                            <input type="file" class="form-control"  name="image"  >
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