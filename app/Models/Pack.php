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
    
    public function orders(){
        return $this->belongsToMany(Order::class);
    }
    
    public function foods() {
        return $this->belongsToMany(Food::class);
    }
}
