<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $question_id
 * @property string $language
 * @property string $name
 * @property string $content
 * @property Question $question
 */
class QuestionLanguage extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['question_id', 'language', 'name', 'content'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question()
    {
        return $this->belongsTo('App\Models\Question');
    }
}
