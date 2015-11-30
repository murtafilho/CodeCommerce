<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'featured',
        'recommended',
        'category_id'
    ];

    public function images(){
        return $this->hasMany('CodeCommerce\ProductImage');
    }

    public function tags(){
        return $this->belongsToMany('CodeCommerce\Tag');
    }

    public function scopeFeatured($query){
        return $query->where('featured','=',1);
    }

    public function scopeRecommended($query){
        return $query->where('recommended','=',1);
    }
    public function getTagListAttribute(){
        $tags = $this->tags()->lists('name')->toArray();
        return implode(', ',$tags);

    }
    public function category(){
        return $this->hasOne('CodeCommerce\Category');
    }

    public function scopeCategoryProducts($query,$category_id){
        return $query->where('category_id','=',$category_id);
    }

}
