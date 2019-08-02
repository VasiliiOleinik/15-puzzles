<?php

namespace App\Models\Marker;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $marker_id
 * @property string $language
 * @property string $name
 * @property string $content
 * @property Marker $marker
 */
class MarkerLanguage extends Model
{
    public $timestamps = false;
    
    /**
     * @var array
     */
    protected $fillable = ['marker_id', 'language', 'name', 'content'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function marker()
    {
        return $this->belongsTo('App\Models\Marker\Marker');
    }
}
