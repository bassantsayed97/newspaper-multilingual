<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use App\Models\category;
class category_ar extends Model
{
    use HasFactory;
    protected $guarded;
    protected $connection = 'mysql2';
    protected $table = 'category_ar';
    protected $primaryKey = 'id';
    public function category(){

        return $this->belongsTo(Caregory::class ,'category_id');

     } 
     public function postAR()
 {
     return $this->belongsToMany(Post_ar::class, "category_post_ar", 'post_id', 'category_id');
 }

}
