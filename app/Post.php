<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'content'
    ];
    // EAGER LOADING
    // protected $with = [
    //     'category',
    //     'tags'
    // ];
    /**
     * Relazioni
     */
    // posts - categories
    public function category() {
        return $this->belongsTo('App\Category');
    }
    // posts - tags
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
}
