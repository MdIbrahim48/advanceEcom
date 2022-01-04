<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubsubCategory extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function category(){
        return $this->belongsTo('App\Models\Category','category_id','id');
    }
    public function subcategory(){
        return $this->belongsTo('App\Models\SubCategory','subcategory_id','id');
    }
}
