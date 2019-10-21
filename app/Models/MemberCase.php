<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\MemberCase
 *
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
 * @property string|null $alias
 * @property int $is_active
 * @property-read \App\Models\MemberCaseLanguage $casesEng
 * @property-read \App\Models\MemberCaseLanguage $casesRu
 * @property-read int|null $tags_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemberCase newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemberCase newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemberCase query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemberCase whereAlias($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemberCase whereAnonym($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemberCase whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemberCase whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemberCase whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemberCase whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemberCase whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemberCase whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemberCase whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemberCase whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemberCase whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemberCase whereUserId($value)
 * @mixin \Eloquent
 */
class MemberCase extends Model
{

    /**
     * @var array
     */
    protected $fillable = [
        'alias',
        'user_id',
        'img',
        'status',
        'anonym',
        'title',
        'description',
        'content',
        'is_active',
        'created_at',
        'updated_at'
    ];

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

    public function casesEng()
    {
        return $this->hasOne(MemberCaseLanguage::class)
            ->where('language', 'eng');
    }

    public function casesLanguage($lang)
    {
        return $this->hasOne(MemberCaseLanguage::class)->where('language', $lang)->first();
    }
}
