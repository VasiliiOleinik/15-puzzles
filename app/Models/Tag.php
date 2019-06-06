<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property ArticleTag[] $articleTags
 */
class Tag extends Model
{
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
}
