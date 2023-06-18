<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Color_Product extends Model
{
    use softDeletes;
    use HasFactory;
    protected $table = 'color_products';
}
