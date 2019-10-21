<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\MemberCaseLanguage
 *
 * @property int $id
 * @property int $member_case_id
 * @property string $language
 * @property string $title
 * @property string $description
 * @property string $content
 * @property MemberCase $memberCase
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemberCaseLanguage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemberCaseLanguage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemberCaseLanguage query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemberCaseLanguage whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemberCaseLanguage whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemberCaseLanguage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemberCaseLanguage whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemberCaseLanguage whereMemberCaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemberCaseLanguage whereTitle($value)
 * @mixin \Eloquent
 */
class MemberCaseLanguage extends Model
{
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['member_case_id', 'language', 'title', 'description', 'content'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function memberCase()
    {
        return $this->belongsTo('App\Models\MemberCase');
    }
}
