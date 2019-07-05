<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property Artile[] $articles
 */
class CategoryForNews extends Model
{
    public $timestamps = false;

    protected $table = 'categories_for_news';

    /**
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles()
    {
        return $this->belongsToMany('App\Models\Article\Article', 'article_categories_for_news');
    }
}
