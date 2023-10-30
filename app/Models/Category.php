<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoryProduct;

class Category extends Model
{
    use HasFactory;

    protected $fillable=[
        "name",
        "user_id"
    ];

    public function categoryProducts(){
        return $this->hasMany(CategoryProduct::class);
    }

}
