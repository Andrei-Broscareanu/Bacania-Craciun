<?php

namespace App\Models;

use App\Enums\ReviewStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{

    use Searchable;

    protected $fillable = ['name', 'description', 'price', 'category_id'];

    public function categories(){
        return $this->belongsToMany('App\Models\Category');
    }

    public function users(){
        return $this->belongsToMany(User::class,'cart_items')->withPivot('quantity');
    }

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function unassociatedCategories()
    {
        return Category::whereDoesntHave('products', function ($query) {
            $query->where('product_id', $this->id);
        })->get();

    }

    public function getCategoriesCount(){
        return $this->categories()->count();
    }

    public function toSearchableArray(): array
    {
        return [
            'name' => $this->name,
        ];
    }

    public function getApprovedReviews(){
        return $this->reviews()->where('approval_status', ReviewStatus::Approved)->get();
    }

    public function getAvgRating(){
        return Review::where('product_id',$this->id)->avg('rating');
    }

    public function reviews() {
        return $this->hasMany(Review::class);
    }

}
