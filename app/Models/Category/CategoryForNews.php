<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Category\CategoryForNews
 *
 * @property int $id
 * @property string $name
 * @property Artile[] $articles
 * @property string|null $alias
 * @property int $is_active
 * @property-read int|null $articles_count
 * @property-read \App\Models\Category\CategoryForNewsLanguage $categoryEng
 * @property-read \App\Models\Category\CategoryForNewsLanguage $categoryNames
 * @property-read \App\Models\Category\CategoryForNewsLanguage $categoryRu
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category\CategoryForNews newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category\CategoryForNews newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category\CategoryForNews query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category\CategoryForNews whereAlias($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category\CategoryForNews whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category\CategoryForNews whereIsActive($value)
 * @mixin \Eloquent
 */
class CategoryForNews extends Model
{
    public $timestamps = false;
    protected $table = 'categories_for_news';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function articles()
    {
        return $this->belongsToMany('App\Models\Article\Article', 'article_categories_for_news');
    }

    public function categoryRu()
    {
        return $this->hasOne(CategoryForNewsLanguage::class)
            ->where('language', 'ru');
    }

    public function categoryEng()
    {
        return $this->hasOne(CategoryForNewsLanguage::class)
            ->where('language', 'eng');
    }

    public function categoryNames()
    {
        return $this->hasOne(CategoryForNewsLanguage::class)

            ->where('language', 'eng');
    }
}
