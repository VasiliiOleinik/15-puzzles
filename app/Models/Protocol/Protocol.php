<?php

namespace App\Models\Protocol;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $evidence_id
 * @property string $name
 * @property string $content
 * @property Evidence $evidence
 * @property DiseaseProtocol[] $diseaseProtocols
 * @property PieceProtocol[] $pieceProtocols
 * @property ProtocolMarker[] $protocolMarkers
 * @property ProtocolRemedy[] $protocolRemedies
 */
class Protocol extends Model
{
	public $timestamps = false;
	
    /**
     * @var array
     */
    protected $fillable = ['evidence_id', 'name', 'content'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function evidence()
    {
        return $this->belongsTo('App\Models\Evidence');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function diseaseProtocols()
    {
        return $this->hasMany('App\Models\Disease\DiseaseProtocol');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pieceProtocols()
    {
        return $this->hasMany('App\Models\Piece\PieceProtocol');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function protocolMarkers()
    {
        return $this->hasMany('App\Models\Protocol\ProtocolMarker');
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
    public function pieces()
    {
    return $this->belongsToMany('App\Models\Piece\Piece', 'piece_protocols');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function diseases()
    {
    return $this->belongsToMany('App\Models\Disease\Disease', 'disease_protocols');
    }
}
