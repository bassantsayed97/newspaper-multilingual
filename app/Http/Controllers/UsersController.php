<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
            $this->middleware("auth");
    }
    public function index()
    {
        //
        $users=User::all();

        return view("admin.all_users",["users"=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("admin.add_user");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"=>"required|min:3", 
            
            "email"=>"required",
            "password"=>"min:6|required|confirmed",    
            "password_confirmation"=>"required",
             



            ]);
         
         User::create([
            "name"=>$request["name"],
            "email"=>$request["email"],
            "password"=>Hash::make ($request["password"]),
            
        ]);
        //
        return redirect(route("users.index")); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        return view("admin.viewuser",["user"=>$user]);
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view("admin.edit_user",["user"=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // 
        $request->validate([
            "name"=>"required|min:3", 
            
            "email"=>"required",
            "password"=>"min:6|required|confirmed",
            
            "password_confirmation"=>"required",



            ]);
      
        $user->update([
            "name"=>$request["name"],
            "email"=>$request["email"],
           
            "password_confirmation"=>$request["password_confirmation"],
                       ]);
            return redirect(route("users.index"));
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        return redirect(route("users.index"));
    }
    public function getPosts($user){
        $posts=User::find($user)->post;
        $user=User::find($user);
        return view("website.profile",["posts"=>$posts, "user"=>$user]);}

}

