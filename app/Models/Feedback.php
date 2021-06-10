<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use App\Models\Feedback_ar;
use App\Models\Feedback_en;
class Feedback extends Model
{
    use HasFactory;
    protected $guarded;
 
    protected $connection = 'mysql';
    protected $table = 'feedback';
    protected $primaryKey = 'id';

    public function post(){

        return $this->belongsTo(Posts::class);
    
     }
     public function feedback_ar()
     {
         return $this->hasOne(Feedback_ar::class,'feedback_ar','id');
     }
     public function feedback_en()
     {
         return $this->hasOne(Feedback_en::class,'feedback_en','id');
     }

}

