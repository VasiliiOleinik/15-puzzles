<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property integer $user_id
 * @property string $title
 * @property string $content
 * @property string $img
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
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