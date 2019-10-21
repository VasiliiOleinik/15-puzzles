<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Category\CategoryForBooks
 *
 * @property int $id
 * @property string $name
 * @property string|null $alias
 * @property int $is_active
 * @property-read \App\Models\Category\CategoryForBooksLanguage $bookEng
 * @property-read \App\Models\Category\CategoryForBooksLanguage $bookRu
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Book\Book[] $books
 * @property-read int|null $books_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category\CategoryForBooks newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category\CategoryForBooks newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category\CategoryForBooks query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category\CategoryForBooks whereAlias($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category\CategoryForBooks whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category\CategoryForBooks whereIsActive($value)
 * @mixin \Eloquent
 */
class CategoryForBooks extends Model
{
    public $timestamps = false;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories_for_books';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function books()
    {
        return $this->belongsToMany('App\Models\Book\Book', 'book_categories_for_books');
    }

    public function bookRu()
    {
        return $this->hasOne(CategoryForBooksLanguage::class)
            ->where('language', 'ru');
    }

    public function bookEng()
    {
        return $this->hasOne(CategoryForBooksLanguage::class)
            ->where('language', 'eng');
    }
}
