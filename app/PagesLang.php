<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\PagesLang
 *
 * @property int $id
 * @property string $language
 * @property string $title
 * @property int $pages_id
 * @property string|null $description
 * @property string|null $short_description
 * @property string|null $puzzles_description
 * @property string|null $h1
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PagesLang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PagesLang newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PagesLang query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PagesLang whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PagesLang whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PagesLang whereH1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PagesLang whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PagesLang whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PagesLang wherePagesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PagesLang wherePuzzlesDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PagesLang whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PagesLang whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PagesLang whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PagesLang extends Model
{
    protected $guarded = [];
}
