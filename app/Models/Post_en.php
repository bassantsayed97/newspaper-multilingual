<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use App\Models\Post;
class Post_en extends Model
{
    use HasFactory;
    protected $guarded;
    protected $connection = 'mysql1';
    protected $table = 'posts_en';
    protected $primaryKey = 'id';
    public function posts(){

        return $this->belongsTo(Posts::class);

     } 
     public function categoryEN()
     {
         return $this->belongsToMany(category_en::class,"category_post_en",'post_id','category_id');
     }
  
}
