<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property integer $user_id
 * @property int $permission_id
 * @property Permission $permission
 * @property User $user
 */
class UserPermission extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'permission_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function permission()
    {
        return $this->belongsTo('App\Models\Permission');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
