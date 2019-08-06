<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $member_case_id
 * @property string $language
 * @property string $title
 * @property string $description
 * @property string $content
 * @property MemberCase $memberCase
 */
class MemberCaseLanguage extends Model
{
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
