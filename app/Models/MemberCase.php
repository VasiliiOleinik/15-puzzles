<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property integer $user_id
 * @property string $description
 * @property string $content
 * @property string $img
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 */
class MemberCase extends Model
{
    //public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'description', 'content', 'img', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User\User');
    }
}
