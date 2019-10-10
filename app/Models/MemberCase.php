<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property integer $user_id
 * @property string $title
 * @property string $description
 * @property string $content
 * @property string $img
 * @property string $status
 * @property string $anonym
 * @property string $created_at
 * @property string $updated_at
 * @property MemberCaseTag[] $tags
 * @property User $user
 */
class MemberCase extends Model
{

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'title', 'description', 'content', 'img', 'status', 'anonym', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
    return $this->belongsToMany('App\Models\Tag', 'member_case_tags');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User\User');
    }

    public function casesRu()
    {
        return $this->hasOne(MemberCaseLanguage::class)
            ->where('language', 'ru');
    }
}
