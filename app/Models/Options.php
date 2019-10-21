<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Options
 *
 * @property int $id
 * @property string|null $privacy_policy
 * @property string|null $terms_of_service
 * @property string|null $logo
 * @property string|null $admin_email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Options newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Options newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Options query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Options whereAdminEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Options whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Options whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Options whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Options wherePrivacyPolicy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Options whereTermsOfService($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Options whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Options extends Model
{
   protected $guarded = [];
}
