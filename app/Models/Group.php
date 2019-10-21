<?php

namespace App\Models;

use App\Scopes\LanguageScope;
use Illuminate\Database\Eloquent\Model;

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
