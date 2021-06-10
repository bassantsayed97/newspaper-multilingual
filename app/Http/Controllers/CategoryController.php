<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\category_ar;
use App\Models\category_en;
use Illuminate\Http\Request;
use LaravelLocalization;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware("auth");}
    public function index()
    {
         $category= Category::all();
        //  'image',
        //  'title_' . LaravelLocalization::getCurrentLocale() . ' as title',
        //  'body_' . LaravelLocalization::getCurrentLocale() . ' as body');
         $category_en= Category::all();
        //  'image',
        //  'title_' . LaravelLocalization::getCurrentLocale() . ' as title',
        //  'body_' . LaravelLocalization::getCurrentLocale() . ' as body'); 
         $category_ar= Category::all();
        //  'image',
        //  'title_' . LaravelLocalization::getCurrentLocale() . ' as title',
        //  'body_' . LaravelLocalization::getCurrentLocale() . ' as body');
        
        return view('admin.all_categories',["categories"=>$category, "categories_en"=>$category_en,"categories_ar"=>$category_ar]);

    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    
        return view('admin.add_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $category=new  Category;
        $category_ar=new category_ar;
        $category_en=new category_en;
        
     
         $category->setConnection('mysql');
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename =rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('categoryimg/'), $filename);
            $filename='categoryimg/'.$filename;
            
        }

       $category->image=$filename;
        $category->save();

        $category_ar->setConnection('mysql2');
        $category->category_ar()->create([
            "name"=>$request["nameAR"],
            
          
        ]); 
        $category_en->setConnection('mysql1');
        $category->category_en()->create([
            "name"=>$request["nameEN"],
            
          
        ]);  return redirect(route("category.index"));
    }
   

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $category_ar=new category_ar;
        $category_ar=$category_ar->find($category->id);
        $category_en=new category_en;
        $category_en=$category_en->find($category->id);
        return view("admin.showcategory",["category"=>$category, "categories_ar"=>$category_ar,"categories_en"=>$category_en]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        $category_ar=new category_ar;
        $category_ar=$category_ar->find($category->id);
        $category_en=new category_en;
        $category_en=$category_en->find($category->id);
        return view("admin.editcategory",["category"=>$category, "categories_ar"=>$category_ar,"categories_en"=>$category_en]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category )
    {
        $category_ar=new category_ar;
        $category_ar=$category_ar->find($category->id);
        $category_en=new category_en;
        $category_en=$category_en->find($category->id);
   
        $category->setConnection('mysql');
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename =rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('categoryimg/'), $filename);
            $filename='categoryimg/'.$filename;
            
        }
        $category->update([
           
        "image"=>$filename

        ]);
       
      
      
        $category->category_en()->update([
            "name"=>$request["nameEN"],
             
        ]); 

     
        $category->category_ar()->update([
            "name"=>$request["nameAR"],
            
        ]); 
    
      
      
        return redirect(route("category.index",["category"=>$category]));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        $category->delete();
        return redirect(route("category.index"));

    }
}
