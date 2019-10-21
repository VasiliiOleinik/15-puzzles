<?php

namespace App\Models\Article;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\LanguageScope;

/**
 * App\Models\Article\ArticleLanguage
 *
 * @property int $id
 * @property int $article_id
 * @property string $language
 * @property string $title
 * @property string $description
 * @property string $content
 * @property Article $article
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article\ArticleLanguage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article\ArticleLanguage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article\ArticleLanguage query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article\ArticleLanguage whereArticleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article\ArticleLanguage whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article\ArticleLanguage whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article\ArticleLanguage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article\ArticleLanguage whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article\ArticleLanguage whereTitle($value)
 * @mixin \Eloquent
 */
class ArticleLanguage extends Model
{
    public $timestamps = false;

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new LanguageScope);
    }

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
