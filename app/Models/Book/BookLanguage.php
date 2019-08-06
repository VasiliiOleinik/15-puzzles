<?php

namespace App\Models\Book;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $book_id
 * @property string $language
 * @property string $title
 * @property string $author
 * @property string $description
 * @property Book $book
 */
class BookLanguage extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['book_id', 'language', 'title', 'author', 'description'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function book()
    {
        return $this->belongsTo('App\Models\Book\Book');
    }
}
