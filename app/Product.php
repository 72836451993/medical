<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name','image','weight'
    ];
    protected $with = [
        'category','producer'
    ];
    public function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }
    public function producer(){
        return $this->hasOne(Producer::class,'id','producer_id');
    }
}
