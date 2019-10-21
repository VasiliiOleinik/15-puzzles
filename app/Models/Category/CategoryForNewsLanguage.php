<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\LanguageScope;

/**
 * App\Models\Category\CategoryForNewsLanguage
 *
 * @property int $id
 * @property int $category_for_news_id
 * @property string $language
 * @property string $name
 * @property CategoriesForNews $categoriesForNews
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category\CategoryForNewsLanguage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category\CategoryForNewsLanguage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category\CategoryForNewsLanguage query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category\CategoryForNewsLanguage whereCategoryForNewsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category\CategoryForNewsLanguage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category\CategoryForNewsLanguage whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category\CategoryForNewsLanguage whereName($value)
 * @mixin \Eloquent
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
