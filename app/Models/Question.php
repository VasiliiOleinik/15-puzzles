<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string $content
 */
class Question extends Model
{
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['title', 'content'];

}
