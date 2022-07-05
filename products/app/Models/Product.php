<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'name', 
        'category',
        'description',
        'dateandtime',
        // 'images'
    ];
    public function images()
    {
        return $this->hasMany('App\Image');
    }
}
