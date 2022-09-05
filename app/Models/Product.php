<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function file()
    {
        return $this->morphOne(File::class,'fileable');
    }

    public function discount()
    {
        return $this->hasOne(Discount::class);
    }

    public function addDiscount(Request $request)
    {
        if (!$this->discount()->exists()){
            $this->discount()->create([
                'value' => $request->get('value')
            ]);
        }else {
            $this->discount->update([
                'value' => $request->get('value')
            ]);
        }
    }

    public function getCostWithDiscount()
    {
        if (!$this->discount()->exists()){
            return $this->cost;
        }
        return $this->cost - $this->cost * $this->discount->value /100;
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes')
            ->withTimestamps();
    }

    public function getIsLikedAttribute()
    {
        return $this->likes()->where('user_id', auth()->id())->exists();
    }
}
