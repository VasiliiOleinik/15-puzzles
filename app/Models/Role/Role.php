<?php

namespace App\Models\Role;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property UserRole[] $userRoles
 */
class Role extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name'];

	/**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rolePermissions()
    {
        return $this->hasMany('App\Models\Role\RolePermission');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\Models\User\User');
    }
}
