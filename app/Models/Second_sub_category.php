<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Second_sub_category extends Model
{
    use HasFactory;
    protected $table = 'second_sub_categories';
    protected $fillable = [
        'sub_category_id',
        'second_sub_category_name',
    ];
}
