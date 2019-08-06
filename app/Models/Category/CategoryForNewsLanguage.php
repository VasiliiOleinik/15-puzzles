<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\LanguageScope;

/**
 * @property int $id
 * @property int $category_for_news_id
 * @property string $language
 * @property string $name
 * @property CategoriesForNews $categoriesForNews
 */
class CategoryForNewsLanguage extends Model
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
    protected $fillable = ['category_for_news_id', 'language', 'name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categoriesForNews()
    {
        return $this->belongsTo('App\Models\Category\CategoryForNews', 'category_for_news_id');
    }
}
