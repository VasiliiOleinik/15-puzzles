<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property integer $user_id
 * @property string $name
 * @property string $path
 * @property string $type
 * @property int $size
 * @property User $user
 */
class File extends Model
{    

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'name', 'path', 'type', 'size'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User\User');
    }
}
