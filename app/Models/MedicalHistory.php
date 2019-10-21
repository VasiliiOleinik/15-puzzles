<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\MedicalHistory
 *
 * @property int $id
 * @property integer $user_id
 * @property string $title
 * @property string $content
 * @property string $img
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalHistory whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalHistory whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalHistory whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalHistory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MedicalHistory whereUserId($value)
 * @mixin \Eloquent
 */
class MedicalHistory extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'title', 'content', 'img', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User\User');
    }
}
