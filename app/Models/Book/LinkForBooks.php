<?php

namespace App\Models\Book;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $url
 * @property Book[] $books
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
    protected $fillable = ['url'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function books()
    {
        return $this->belongsToMany('App\Models\Book\Book', 'book_links_for_books');
    }
}
