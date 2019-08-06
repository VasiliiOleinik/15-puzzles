<?php

namespace App\Models\Article;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\LanguageScope;

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
