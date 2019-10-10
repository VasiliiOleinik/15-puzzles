<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
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
    protected $fillable = ['name'];

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
