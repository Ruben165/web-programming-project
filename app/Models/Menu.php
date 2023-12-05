<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Menu extends Model
{
    protected $table = "menu";
    protected $primaryKey = "food_id";
    protected $fillable = [
        'food_name',
        'food_type',
        'food_price',
        'brief_desc',
        'about_food',
        'food_img'
    ];

    public $timestamps = false;
    
    use HasFactory, HasUuids;
}
