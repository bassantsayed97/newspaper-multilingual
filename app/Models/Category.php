<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use App\Models\category_ar;
use App\Models\category_en;
class Category extends Model
{
    use HasFactory;
    protected $guarded;
    protected $connection = 'mysql';
    protected $table = 'category';
    protected $primaryKey = 'id';
    public function post()
    {
        return $this->belongsToMany(Course::class,"category_Posts");
    }
    public function category_ar()
    {
        return $this->hasOne(category_ar::class,'category_id','id');
    }
    public function category_en()
    {
        return $this->hasOne(category_en::class,'category_id','id');
    }
}
