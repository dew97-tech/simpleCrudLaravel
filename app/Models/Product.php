<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'price'
    
        
    ];

    public function categories(){
        return $this->belongsToMany(Category::class,'category_products');
    }
}

// How we can connect 2 models 

// array theke perticular ID wise array data show