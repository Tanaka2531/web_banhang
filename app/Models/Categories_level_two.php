<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Categories_level_two extends Model
{
    use softDeletes;
    use HasFactory;
    protected $table = 'categories_level_twos';
}
