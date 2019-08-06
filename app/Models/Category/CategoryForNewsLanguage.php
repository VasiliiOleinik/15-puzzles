<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $category_for_news_id
 * @property string $language
 * @property string $name
 * @property CategoriesForNews $categoriesForNews
 */
class CategoryForNewsLanguage extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['category_for_news_id', 'language', 'name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categoriesForNews()
    {
        return $this->belongsTo('App\Models\Category\CategoriesForNews', 'category_for_news_id');
    }
}
