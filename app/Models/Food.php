<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    protected $table = 'foods';
    
    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    
    public function packs() {
        return $this->belongsToMany(Pack::class);
    }
    
    public function ingredients() {
        return $this->belongsToMany(Ingredient::class);
    }
}
