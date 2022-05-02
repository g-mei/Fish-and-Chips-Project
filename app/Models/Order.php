<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    public function foods(){
        return $this->belongsToMany(Food::class, 'order_food')->withPivot('id', 'qty', 'instructions');
    }
    
    public function packs(){
        return $this->belongsToMany(Pack::class, 'order_pack')->withPivot('id', 'qty', 'instructions');
    }
}
