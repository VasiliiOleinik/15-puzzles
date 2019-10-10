<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $content
 * @property DiseaseRemedy[] $diseaseRemedies
 * @property FactorRemedy[] $factorRemedies
 * @property ProtocolRemedy[] $protocolRemedies
 */
class Remedy extends Model
{
	public $timestamps = false;

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
}
