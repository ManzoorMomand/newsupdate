<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'sub_category_id',
        'post_title',
        'post_detail',
        'visitors'


        ];
    public function rSubCategory(){
        return $this->belongsTo(SubCategory::class,'sub_category_id'); // 1 sub category belongs to one category.
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }
    
}
