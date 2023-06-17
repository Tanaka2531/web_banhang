<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Size_Product extends Model
{
    use softDeletes;
    use HasFactory;
    protected $table = 'size_products';
}
