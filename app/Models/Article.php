<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='articles';
    public $timestamps = true;
    protected $fillable = [
        'name',
        'slug',
        'created_at',
        'content',
        'image',
        'title',
        'category_id',
    ];

    public function getCategoryName(){
       return  $this->hasOne('App\Models\Category','id','category_id');
    }

}
