<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    public function parent()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'category_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    public function getAllSubCategoryProducts()
    {
        $childrenIds = $this->children()->pluck('id')->toArray();
        return Product::query()
            ->whereIn('category_id', $childrenIds)
            ->orWhere('category_id', $this->id)
            ->get();
    }

}