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

}
