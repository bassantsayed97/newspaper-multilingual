<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use App\Models\Post_ar;
use App\Models\Post_en;
class Posts extends Model
{
    use HasFactory;
    protected $guarded;
    protected $connection = 'mysql';
    protected $table = 'posts';
    protected $primaryKey = 'id';
    public function user(){

        return $this->belongsTo(User::class);

     }
     public function Category()
     {
         return $this->belongsToMany(Category::class, 'category_posts');
     }
     public function feedback()
{
    return $this->belongsToMany(Feedback::class);
}
public function post_ar()
{
    return $this->hasOne(Post_ar::class,'posts_id','id');
}
public function post_en()
{
    return $this->hasOne(Post_en::class,'posts_id','id');
}
}
