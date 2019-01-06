<?php

namespace App;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements SluggableInterface
{
    use SluggableTrait;
    protected $sluggable = [
        'build_form' =>'title',
        'save_to'    =>'slug',
        'onUpdate'    => true,



    ];
    //
    protected $fillable=[


        'category_id','photo_id','title','body'
    ];
public function user(){


    return $this->belongsTo('App\User');
}
    public function photo(){


        return $this->belongsTo('App\photo');
    }
    public function  category()
    {
        return $this->belongsTo('App\Category');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }



}
