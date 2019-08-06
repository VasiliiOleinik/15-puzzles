<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $category_for_books_id
 * @property string $language
 * @property string $name
 * @property CategoriesForBook $categoriesForBook
 */
class CategoryForBooksLanguage extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['category_for_books_id', 'language', 'name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categoriesForBook()
    {
        return $this->belongsTo('App\Models\Category\CategoriesForBook', 'category_for_books_id');
    }
}
