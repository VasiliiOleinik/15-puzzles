<?php

namespace App\Models\Article;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $article_id
 * @property string $language
 * @property string $title
 * @property string $description
 * @property string $content
 * @property Article $article
 */
class ArticleLanguage extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['article_id', 'language', 'title', 'description', 'content'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function article()
    {
        return $this->belongsTo('App\Models\Article\Article');
    }
}
