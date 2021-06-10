@extends('layouts.admin_layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{__('admin.posts')}}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">{{__('admin.home')}}</a></li>
            <li class="breadcrumb-item active">{{__('admin.addpost')}}</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <div style="padding-top:10px; padding-left:50px ;" class="container-fluid">
    <div class="row">

      <div class="col-xs-12 sub">
        <div class="row">
          <div class="col-xs-12">
            <h3><span class="fa fa-users"></span> {{__('admin.posts')}} <button class="btn btn-success m-l-15"><span class="fa fa-plus"></span><a style="text-decoration: none ; color: white;" href="{{route('posts.create')}}">{{__('admin.addpost')}}</a></button></h3>

          </div>
          <div class="col-xs-12 col-sm-6 ">
            <div class="form-group p-t-20">
              <select class="form-control">
                <option selected disabled>Amount</option>
                <option value="10" selected>10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
              </select>
            </div>
          </div>
          <div class="col-xs-12 col-sm-12">
            <table style="width: 1000px;" class="table table-bordered table-striped bg-dark" style="color:white; border:none">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Title EN</th>
                  <th>Content EN</th>
                  <th class="text-right">العنوان</th>
                  <th class="text-right">المحتوي</th>
                  <th>Categry name</th>
                  <th class="text-right">اسم الفئه</th>
                  <th>Image</th>

                  <th>Options</th>
                </tr>
              </thead>
              <tbody style="color:black; font:blod; background:#ffff">
                @foreach($posts as $post)
                <tr>
                  <td>{{$post["id"]}}</td>
                  <td>{{$post["Post_en"]["title"]}}</td>
                  <td>{{$post["Post_en"]["body"]}}</td>
                  <td class="text-right">{{$post["Post_ar"]["title"]}}</td>
                  <td class="text-right">{{$post["Post_ar"]["body"]}}</td>
                  <td>
                    {{$post_cats[$post["Post_en"]["id"]]}}
                  </td>
                  <td class="text-right">
                  {{$post_cats[$post["Post_ar"]["id"]]}}</td>
                  <td>
                    <img src="{{ asset($post['image']) }}" class="rounded-circle" width="60" height="50" />
                  </td>
                  </td>
                  <td>
                    <a href="{{route('posts.edit',$post)}}"><span class="fa fa-edit"></span></a>
                    <a class="text-success m-l-5" href="{{route('posts.show',$post)}}"><span class="fa fa-eye"></span></a>
                    <form action="{{route('posts.destroy',$post)}}" method="Post" enctype="multipart/form-data" style="display:inline-block;">
                      @csrf
                      @method("delete")

                      <button type="submit" value="Delete" class="fa fa-trash"> </button>

                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="container">

            </div>
          </div>
          <div class="col-xs-12">

          </div>
        </div>
      </div>
    </div>
  </div>

  @endsection('content')