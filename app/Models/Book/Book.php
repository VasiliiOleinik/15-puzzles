<?php

namespace App\Models\Book;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string $author
 * @property string $description
 * @property string $img
 * @property LinkForBooks[] $linksForBooks
 * @property CategoryForBooks[] $categoriesForBooks
 * @property BookTag[] $tags
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
}
