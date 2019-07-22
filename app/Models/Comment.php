<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $member_case_id
 * @property integer $user_id
 * @property string $content
 * @property string $created_at
 * @property string $updated_at
 * @property MemberCase $memberCase
 * @property User $user
 */
class Comment extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['member_case_id', 'user_id', 'content', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function memberCase()
    {
        return $this->belongsTo('App\Models\MemberCase');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User\User');
    }
}
