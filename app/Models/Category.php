<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Sub_category;
use App\Models\Product;
class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'category_name',
    ];

    public function sub_categories(){
        return $this->hasMany(Sub_category::class,'id','category_id');
    }

    // public function product(){
    //     return $this->belongsTo(Product::class,'category_id');
    // }
}
