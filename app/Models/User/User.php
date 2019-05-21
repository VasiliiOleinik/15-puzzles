<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property integer $id
 * @property int $role_id
 * @property string $name
 * @property string $email
 * @property string $email_verified_at
 * @property string $password
 * @property string $remember_token
 * @property string $created_at
 * @property string $updated_at
 * @property Role $role
 * @property Case[] $cases
 * @property UserPermission[] $userPermissions
 */
class User extends Authenticatable implements MustVerifyEmail
{
	use Notifiable;
	
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['role_id', 'name', 'email', 'email_verified_at', 'password', 'remember_token', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cases()
    {
        return $this->hasMany('App\Models\Case');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userPermissions()
    {
        return $this->hasMany('App\Models\User\UserPermission');
    }
}
