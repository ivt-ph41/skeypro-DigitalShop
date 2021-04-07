<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function imageCover(){
        return $this->hasOne('App\File','id','imageCover_id');
    }
    public function vouchers(){
        return $this->belongsToMany('App\Voucher', 'product_vouchers','product_id','voucher_id','id')->get();
    }
    public function images(){
        return $this->belongsToMany('App\File','product_images','product_id','image_id','id');
    }
    public function category(){
        return $this->hasOne('App\Category','id','category_id');
    }
}
