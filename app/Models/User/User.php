<?php

namespace App\Models\User;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\LocaleResetPassword;

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
 * @property MedicalHistory[] $medicalHistories
 */

class User extends Authenticatable implements MustVerifyEmail
{
	use Notifiable;

    protected $fillable = ['role_id', 'nickname', 'first_name', 'middle_name', 'last_name', 'email', 'email_verified_at', 'password', 'remember_token', 'img', 'birthday', 'created_at', 'updated_at'];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new LocaleResetPassword($token));
    }

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
   protected  $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo('App\Models\Role\Role');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function files()
    {
        return $this->hasMany('App\Models\File');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function memberCases()
    {
        return $this->hasMany('App\Models\MemberCase');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function medicalHistories()
    {
        return $this->hasMany('App\Models\MedicalHistory');
    }

	/**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userPermissions()
    {
        return $this->hasMany('App\Models\User\UserPermission');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function isAdmin()
    {
        return $this->role->name == "admin";
    }

    public function createHash($request)
    {
        $hash = str_random(5);
        $hash_expire = Carbon::now()->addMinutes(5);
        $cryptStr = \Crypt::encrypt($hash . '_' . $hash_expire . '_' . $request->email);
        $this->update([
            'hash' => $cryptStr,
        ]);
    }
}
