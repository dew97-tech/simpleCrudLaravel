<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    // For one to many relationship
    // public function products(){
    //     return $this->hasMany(Product::class,'category_id','id');
    // }

    // For many to many relationship
    public function products(){
        return $this->belongsToMany(Product::class,'category_products');
    }
}
