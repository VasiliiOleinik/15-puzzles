<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\LanguageScope;

/**
 * App\Models\QuestionLanguage
 *
 * @property int $id
 * @property int $question_id
 * @property string $language
 * @property string $name
 * @property string $content
 * @property Question $question
 * @property string|null $title
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\QuestionLanguage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\QuestionLanguage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\QuestionLanguage query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\QuestionLanguage whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\QuestionLanguage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\QuestionLanguage whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\QuestionLanguage whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\QuestionLanguage whereQuestionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\QuestionLanguage whereTitle($value)
 * @mixin \Eloquent
 */
class QuestionLanguage extends Model
{
    public $timestamps = false;

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new LanguageScope);
    }

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
