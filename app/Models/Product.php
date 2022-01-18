<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    use HasFactory;
    protected $fillable = [
        'name','price','category_id','image'
    ];

    public function scopeActive($query){
        return $query->where('category_id',1)->where('price','>=', 10000);
    }
    public function category(){
        return $this->belongsTo(Category::class,'category_id', 'id');
    }

        public function getUpperNameAttribute()
        {
            return ucfirst($this->name);
        }
        public function setNameAttribute($value)
        {
        return  $this->attributes['name'] =  str_replace(' ', '', $value);
        }
    }
