<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PasswordReset
 *
 * @property string $email
 * @property string $token
 * @property string $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PasswordReset newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PasswordReset newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PasswordReset query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PasswordReset whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PasswordReset whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PasswordReset whereToken($value)
 * @mixin \Eloquent
 */
class PasswordReset extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['email', 'token', 'created_at'];

}
