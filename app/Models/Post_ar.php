<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use App\Models\Post;
use App\Models\category_ar;
class Post_ar extends Model
{
    use HasFactory;
    protected $guarded;
    protected $connection = 'mysql2';
    protected $table = 'posts_ar';
    protected $primaryKey = 'id';
    public function posts(){

        return $this->belongsTo(Posts::class);

     } 
     public function categoryAR()
     {
         return $this->belongsToMany(category_ar::class,"category_post_ar",'post_id','category_id');
     }
  
}
