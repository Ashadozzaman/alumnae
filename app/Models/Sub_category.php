<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Second_sub_category;
class Sub_category extends Model
{
    use HasFactory;
    protected $table = 'sub_categories';
    protected $fillable = [
        'category_id',
        'sub_category_name',
    ];

    public function second_sub_category(){
        return $this->hasMany(Second_sub_category::class,'id','sub_category_id');
    }
}
