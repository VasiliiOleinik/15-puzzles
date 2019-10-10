<?php


namespace App\Models\Article;

use App\Scopes\LanguageScope;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $content
 * @property int $category_id
 * @property string $created_at
 * @property string $updated_at
 * @property ArticleTag[] $articleTags
 * @property ArticleTag[] $tags
 * @property CategoryForNews[] $categories
 */
class Article extends Model
{

    /**
     * @var array
     */
    protected $guarded = [];

    protected $fillable = ['alias', 'img', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articleTags()
    {
        return $this->hasMany('App\Models\Article\ArticleTag');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'article_tags');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categoriesForNews()
    {
        return $this->belongsToMany('App\Models\Category\CategoryForNews', 'article_categories_for_news');
    }

    public function articlesEng()
    {
        return $this->hasOne(ArticleLanguage::class);
    }

    public function articlesRu()
    {
        return $this->hasOne(ArticleLanguage::class)->withoutGlobalScope(LanguageScope::class)
            ->where('language', 'ru');
    }

}
