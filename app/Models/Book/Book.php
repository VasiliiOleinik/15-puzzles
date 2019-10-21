<?php

namespace App\Models\Book;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Book\Book
 *
 * @property int $id
 * @property string $title
 * @property string $author
 * @property string $description
 * @property string $img
 * @property LinkForBooks[] $linksForBooks
 * @property CategoryForBooks[] $categoriesForBooks
 * @property BookTag[] $tags
 * @property int $is_active
 * @property-read \App\Models\Book\BookLanguage $bookEng
 * @property-read \App\Models\Book\BookLanguage $bookLang
 * @property-read \App\Models\Book\BookLanguage $bookRu
 * @property-read int|null $categories_for_books_count
 * @property-read int|null $links_for_books_count
 * @property-read int|null $tags_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Book\Book newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Book\Book newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Book\Book query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Book\Book whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Book\Book whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Book\Book whereIsActive($value)
 * @mixin \Eloquent
 */
class Book extends Model
{
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['title', 'author', 'description', 'img'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function linksForBooks()
    {
        return $this->belongsToMany('App\Models\Book\LinkForBooks', 'book_links_for_books');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categoriesForBooks()
    {
        return $this->belongsToMany('App\Models\Category\CategoryForBooks', 'book_categories_for_books');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'book_tags');
    }

    public function bookRu()
    {
        return $this->hasOne(BookLanguage::class)
            ->where('language', 'ru');
    }

    public function bookEng()
    {
        return $this->hasOne(BookLanguage::class)
            ->where('language', 'eng');
    }

    public function bookLang()
    {
        return $this->hasOne(BookLanguage::class);
    }
}
