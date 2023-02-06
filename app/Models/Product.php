<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Product extends Model implements Searchable
{
    use HasFactory,SoftDeletes;
    protected $guarded=[];
    protected $appends = [
        'cost_with_discount',
        'image_path',

    ];

    public function path(){
        return $this->slug;
    }

    public function getSearchResult(): SearchResult
    {       $url = $this->path();

        return new SearchResult($this, $this->title, $url);
    }

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

    public function getCostWithDiscountAttribute()
    {
        if (!$this->discount()->exists()){
            return $this->cost;
        }
        return $this->cost - $this->cost * $this->discount->value /100;
    }

    public function getHasDiscountAttribute()
    {
        return $this->discount()->exists();
    }

    public function getDiscountValueAttribute()
    {
        if($this->has_discount){
            return $this->discount->value;
        }

        return null;
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

    public function getImagePathAttribute()
    {
        return Storage::url($this->file->path.'/'.$this->file->name);
    }
}
