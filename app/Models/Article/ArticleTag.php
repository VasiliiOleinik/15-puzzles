<?php

namespace App\Models\Article;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Article\ArticleTag
 *
 * @property int $id
 * @property int $article_id
 * @property int $tag_id
 * @property Article $article
 * @property Tag $tag
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article\ArticleTag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article\ArticleTag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article\ArticleTag query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article\ArticleTag whereArticleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article\ArticleTag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article\ArticleTag whereTagId($value)
 * @mixin \Eloquent
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
