<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property integer $id
 * @property int $role_id
 * @property string $nickname
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $email
 * @property string $email_verified_at
 * @property string $password
 * @property string $remember_token
 * @property string $img
 * @property string $birthday
 * @property string $created_at
 * @property string $updated_at
 * @property Role $role
 * @property File[] $files
 * @property MemberCase[] $memberCases
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
    protected $fillable = ['role_id', 'nickname', 'first_name', 'middle_name', 'last_name', 'email', 'email_verified_at', 'password', 'remember_token', 'img', 'birthday', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo('App\Models\User\Role');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function files()
    {
        return $this->hasMany('App\Models\User\File');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function memberCases()
    {
        return $this->hasMany('App\Models\User\MemberCase');
    }
	
	/**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userPermissions()
    {
        return $this->hasMany('App\Models\User\UserPermission');
    }
}
