<?php

namespace App\Models;

use App\Scopes\LanguageScope;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Group
 *
 * @property int $id
 * @property string|null $img
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Factor\Factor[] $factors
 * @property-read int|null $factors_count
 * @property-read \App\Models\GroupLanguage $groupEng
 * @property-read \App\Models\GroupLanguage $groupLanguage
 * @property-read \App\Models\GroupLanguage $groupRu
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Group newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Group newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Group query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Group whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Group whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Group whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Group whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Group extends Model
{
   protected $guarded = [];

   public function groupLanguage()
   {
        return $this->hasOne(GroupLanguage::class);
   }

   public function groupRu()
   {
       return $this->hasOne(GroupLanguage::class)
           ->where('language', 'ru');
   }

   public function groupEng()
   {
       return $this->hasOne(GroupLanguage::class)
           ->withoutGlobalScope(new LanguageScope())
           ->where('language', 'eng');
   }

   public function factors()
   {
       return $this->belongsToMany(Factor\Factor::class, 'group_factor');
   }

}
