<?php


namespace App\Models\Article;

use App\Scopes\LanguageScope;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Article\Article
 *
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
 * @property string|null $alias
 * @property string|null $author
 * @property string|null $img
 * @property int $is_active
 * @property-read int|null $article_tags_count
 * @property-read \App\Models\Article\ArticleLanguage $articlesEng
 * @property-read \App\Models\Article\ArticleLanguage $articlesRu
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Category\CategoryForNews[] $categoriesForNews
 * @property-read int|null $categories_for_news_count
 * @property-read int|null $tags_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article\Article newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article\Article newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article\Article query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article\Article whereAlias($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article\Article whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article\Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article\Article whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article\Article whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article\Article whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article\Article whereUpdatedAt($value)
 * @mixin \Eloquent
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

    public function articleLang()
    {
        return $this->hasOne(ArticleLanguage::class);
    }

}
