<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = ['nickname', 'email', 'website', 'content', 'article_id'];


    /**
     * 获得此评论所属的文章。
     */
    public function article()
    {
        return $this->belongsTo('App\Article', 'article_id');
    }

}
