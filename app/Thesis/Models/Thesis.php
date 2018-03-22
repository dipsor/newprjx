<?php

namespace App\Thesis\Models;

use App\Users\Models\User;
use Illuminate\Database\Eloquent\Model;

class Thesis extends Model
{
    protected $fillable = [
        'user_id',
        'typZadani',
        'filePath',
        'originalFileName',
        'price',
        'pribliznyPocetListu',
        'presnyPocetStran',
        'typTisku',
        'barevnost',
        'skoly',
        'jinaSkola',
        'fakulty',
        'jinaFakulta',
        'typPrace',
        'jinyTypPrace',
        'spodniTextVlevo',
        'potiskNahore',
        'potiskDole',
        'pocetPevnychDesek',
        'pocetKrouzkovychDesek',
        'barvaDesek',
        'barvaPisma',
        'pocetKapesProCD',
        'pocetKapesProPosudek',
        'kapsaCdVpredu',
        'kapsaPosudekVpredu',
        'dobaZhotoveni',
        'poznamky',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
