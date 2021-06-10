<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use App\Models\Feedback;
class Feedback_ar extends Model
{
    
    use HasFactory;
    protected $guarded;
    protected $connection = 'mysql2';
    protected $table = 'feedback_ar';
    protected $primaryKey = 'id';
    public function feedback(){

        return $this->belongsTo(Feedback::class);

     } 
}
