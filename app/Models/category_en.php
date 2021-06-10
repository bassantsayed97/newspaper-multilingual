<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\category;
use Illuminate\Support\Facades\App;
class category_en extends Model
{
    use HasFactory;
    protected $guarded;
    protected $connection = 'mysql1';
    protected $table = 'category_en';
    protected $primaryKey = 'id';
    public function category(){

        return $this->belongsTo(Caregory::class);

     } 
     public function postEN()
     {
         return $this->belongsToMany(Post_en::class, "category_post_en", 'post_id', 'category_id');
     }
    
}