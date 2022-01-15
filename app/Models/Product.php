<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;
use App\Models\Product_image;
class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'category_id',
        'product_image_id',
        'product_name',
        'product_description',
        'status',
    ];

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function images(){
        return $this->hasMany(Product_image::class,'product_image_id','id');
    }
}
