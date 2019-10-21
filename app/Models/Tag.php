<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Tag
 *
 * @property int $id
 * @property ArticleTag[] $articleTags
 * @property ArticleTag[] $articles
 * @property BookTag[] $books
 * @property BookTag[] $member_cases
 * @property int $is_active
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read int|null $article_tags_count
 * @property-read int|null $articles_count
 * @property-read int|null $books_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\TagLanguage[] $localization
 * @property-read int|null $localization_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MemberCase[] $memberCases
 * @property-read int|null $member_cases_count
 * @property-read \App\Models\TagLanguage $tagEng
 * @property-read \App\Models\TagLanguage $tagRu
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Tag extends Model
{
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function localization()
    {
        return $this->hasMany('App\Models\TagLanguage');
    }

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

    public function tagRu()
    {
        return $this->hasOne(TagLanguage::class)
            ->where('language', 'ru');
    }

    public function tagEng()
    {
        return $this->hasOne(TagLanguage::class)
            ->where('language', 'eng');
    }

}
