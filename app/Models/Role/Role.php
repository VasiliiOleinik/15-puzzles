<?php

namespace App\Models\Role;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Role\Role
 *
 * @property int $id
 * @property string $name
 * @property UserRole[] $userRoles
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Role\RolePermission[] $rolePermissions
 * @property-read int|null $role_permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role\Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role\Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role\Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role\Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Role\Role whereName($value)
 * @mixin \Eloquent
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
