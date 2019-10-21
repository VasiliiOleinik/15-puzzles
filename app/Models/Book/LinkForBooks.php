<?php

namespace App\Models\Book;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Book\LinkForBooks
 *
 * @property int $id
 * @property string $url
 * @property Book[] $books
 * @property string|null $title
 * @property int $is_active
 * @property-read int|null $books_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Book\LinkForBooks newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Book\LinkForBooks newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Book\LinkForBooks query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Book\LinkForBooks whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Book\LinkForBooks whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Book\LinkForBooks whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Book\LinkForBooks whereUrl($value)
 * @mixin \Eloquent
 */
class LinkForBooks extends Model
{
    public $timestamps = false;
    
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'links_for_books';

    /**
     * @var array
     */
    protected $fillable = ['title, url'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function books()
    {
        return $this->belongsToMany('App\Models\Book\Book', 'book_links_for_books');
    }
}
