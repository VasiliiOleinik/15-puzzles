<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property Artile[] $articles
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
