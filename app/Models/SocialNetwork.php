<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SocialNetwork
 *
 * @property int $id
 * @property string|null $link
 * @property string $img
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialNetwork newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialNetwork newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialNetwork query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialNetwork whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialNetwork whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialNetwork whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialNetwork whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialNetwork whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SocialNetwork extends Model
{
    protected $guarded = [];
}
