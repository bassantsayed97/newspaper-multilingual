<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use App\Models\Feedback;


class Feedback_en extends Model
{
    use HasFactory;
    protected $guarded;
    protected $connection = 'mysql1';
    protected $table = 'feedback_en';
    protected $primaryKey = 'id';
    public function feedback(){

        return $this->belongsTo(Feedback::class);

     } 
}
