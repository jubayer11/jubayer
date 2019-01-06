<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable=
        [
            'post_id',
            'user_id',
            'author',
            'email',
            'body',
            'is_active',
            'photo_id'
        ];



    public function replies()
    {
        return $this->hasMany('App\CommentReply');
    }
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
    public function photo(){


        return $this->belongsTo('App\photo');
    }
}
