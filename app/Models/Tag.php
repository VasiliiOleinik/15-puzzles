<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property ArticleTag[] $articleTags
 * @property ArticleTag[] $articles
 * @property BookTag[] $books
 */
class Tag extends Model
{
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articleTags()
    {
        return $this->hasMany('App\Models\Article\ArticleTag');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function articles()
    {
    return $this->belongsToMany('App\Models\Article\Article', 'article_tags');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function books()
    {
    return $this->belongsToMany('App\Models\Book\Book', 'book_tags');
    }
}
