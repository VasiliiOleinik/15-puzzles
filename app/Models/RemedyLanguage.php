<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $remedy_id
 * @property string $language
 * @property string $name
 * @property string $content
 * @property Remedy $remedy
 */
class RemedyLanguage extends Model
{
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['remedy_id', 'language', 'name', 'content'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function remedy()
    {
        return $this->belongsTo('App\Models\Remedy');
    }
}
