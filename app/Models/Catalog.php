<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    //
    protected $table = 'catalogs';
    protected $fillable = ['title','image','id_sub_category','id_category','path','desc','id_user'];


    public function hasCategory(){
        return $this->belongsTo(Category::class, 'id_category');
    }

    public function hasSubCategory(){
        return $this->belongsTo(Category::class, 'id_sub_category');
    }

    public function hasUser(){
        return $this->belongsTo(User::class,'id_user');
    }
}
