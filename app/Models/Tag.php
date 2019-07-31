<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property ArticleTag[] $articleTags
 * @property ArticleTag[] $articles
 * @property BookTag[] $books
 * @property BookTag[] $member_cases
 */
class Tag extends Model
{
    public $timestamps = false;

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function memberCases()
    {
    return $this->belongsToMany('App\Models\MemberCase', 'member_case_tags');
    }
}
