<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Food extends Model
{
    
protected $table = 'foods';
use HasFactory, SoftDeletes;

    protected $fillable = [
        'food_name',
        'description',
        'ingredients',
        'price',
        'rate',
        'types',
        'picture_path'
        
    ];
}