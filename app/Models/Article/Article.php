<?php

namespace App\Models\Article;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $content
 * @property string $created_at
 * @property string $updated_at
 * @property ArticleTag[] $articleTags
 */
class Article extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['title', 'description', 'content', 'img', 'created_at', 'updated_at'];

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
    public function tags()
    {
    return $this->belongsToMany('App\Models\Tag', 'article_tags');
    }
}
