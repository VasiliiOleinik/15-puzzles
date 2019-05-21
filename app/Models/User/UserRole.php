<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property integer $user_id
 * @property int $role_id
 * @property Role $role
 * @property User $user
 */
class UserRole extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'role_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
