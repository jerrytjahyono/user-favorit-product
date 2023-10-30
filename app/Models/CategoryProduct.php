<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Category;
use App\Models\Product;

class CategoryProduct extends Model
{
    use HasFactory;
    protected $fillable=[
        "product_id",
        "category_id"
    ];

    public function category(): BelongsTo{
        return $this->belongsTo(Category::class);
    }

    public function product(): BelongsTo{
        return $this->belongsTo(Product::class);
    }




}
