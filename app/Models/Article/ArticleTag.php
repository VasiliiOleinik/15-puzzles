<?php

namespace App\Models\Article;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $article_id
 * @property int $tag_id
 * @property Article $article
 * @property Tag $tag
 */
class ArticleTag extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['article_id', 'tag_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function article()
    {
        return $this->belongsTo('App\Models\Article\Article');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tag()
    {
        return $this->belongsTo('App\Models\Tag');
    }
}
