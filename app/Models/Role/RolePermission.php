<?php

namespace App\Models\Role;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $role_id
 * @property int $permission_id
 * @property Permission $permission
 * @property Role $role
 */
class RolePermission extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['role_id', 'permission_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function permission()
    {
        return $this->belongsTo('App\Permission');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo('App\Models\Role\Role');
    }
}
