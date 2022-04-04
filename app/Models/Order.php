<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    public function foods(){
        return $this->belongsToMany(Food::class, 'order_food')->withPivot('qty');
    }
    
    public function packs(){
        return $this->hasMany(Pack::class);
    }
}
