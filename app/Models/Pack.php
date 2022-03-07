<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pack extends Model
{
    use HasFactory;
    protected $table = 'packs';
    
    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
