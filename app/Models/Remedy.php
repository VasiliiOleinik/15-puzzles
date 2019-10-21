<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Remedy
 *
 * @property int $id
 * @property string $name
 * @property string $content
 * @property DiseaseRemedy[] $diseaseRemedies
 * @property FactorRemedy[] $factorRemedies
 * @property ProtocolRemedy[] $protocolRemedies
 * @property int $is_active
 * @property string|null $url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read int|null $disease_remedies_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Disease\Disease[] $diseases
 * @property-read int|null $diseases_count
 * @property-read int|null $factor_remedies_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Factor\Factor[] $factors
 * @property-read int|null $factors_count
 * @property-read int|null $protocol_remedies_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Protocol\Protocol[] $protocols
 * @property-read int|null $protocols_count
 * @property-read \App\Models\RemedyLanguage $remedyEng
 * @property-read \App\Models\RemedyLanguage $remedyLang
 * @property-read \App\Models\RemedyLanguage $remedyRu
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Remedy newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Remedy newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Remedy query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Remedy whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Remedy whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Remedy whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Remedy whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Remedy whereUrl($value)
 * @mixin \Eloquent
 */
class Remedy extends Model
{
	public $timestamps = true;

    /**
     * @var array
     */
    protected $fillable = ['name', 'content'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function diseaseRemedies()
    {
        return $this->hasMany('App\Models\Disease\DiseaseRemedy');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function factorRemedies()
    {
        return $this->hasMany('App\Models\Factor\FactorRemedy');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function protocolRemedies()
    {
        return $this->hasMany('App\Models\Protocol\ProtocolRemedy');
    }

	/**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function factors()
    {
    return $this->belongsToMany('App\Models\Factor\Factor', 'factor_remedies');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function diseases()
    {
    return $this->belongsToMany('App\Models\Disease\Disease', 'disease_remedies');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function protocols()
    {
    return $this->belongsToMany('App\Models\Protocol\Protocol', 'protocol_remedies');
    }

    public function remedyRu()
    {
        return $this->hasOne(RemedyLanguage::class)
            ->where('language', 'ru');
    }
    public function remedyEng()
    {
        return $this->hasOne(RemedyLanguage::class)
            ->where('language', 'eng');
    }

    public function remedyLang()
    {
        return $this->hasOne(RemedyLanguage::class);

    }
}
