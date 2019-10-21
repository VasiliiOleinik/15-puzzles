<?php

namespace App\Models\Book;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\LanguageScope;

/**
 * App\Models\Book\BookLanguage
 *
 * @property int $id
 * @property int $book_id
 * @property string $language
 * @property string $title
 * @property string $author
 * @property string $description
 * @property Book $book
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Book\BookLanguage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Book\BookLanguage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Book\BookLanguage query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Book\BookLanguage whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Book\BookLanguage whereBookId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Book\BookLanguage whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Book\BookLanguage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Book\BookLanguage whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Book\BookLanguage whereTitle($value)
 * @mixin \Eloquent
 */
class BookLanguage extends Model
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
    protected $fillable = ['book_id', 'language', 'title', 'author', 'description'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function book()
    {
        return $this->belongsTo('App\Models\Book\Book');
    }
}
