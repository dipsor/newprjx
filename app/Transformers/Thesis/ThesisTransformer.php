<?php

namespace App\Transformers\Thesis;

use League\Fractal\TransformerAbstract;
use App\Thesis\Models\Thesis;

class ThesisTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Thesis $thesis)
    {
        return [
            'id'                    => (int)$thesis->id,
            'user_id'               => (int)$thesis->user_id,
            'filePath'              => (string)$thesis->filePath,
            'price'                 => (string)$thesis->price,
            'typZadani'             => (string)$thesis->typZadani,
            'pribliznyPocetListu'   => (string)$thesis->pribliznyPocetListu,
            'presnyPocetStran'      => (string)$thesis->presnyPocetStran,
            'typTisku'              => (string)$thesis->typTisku,
            'barevnost'             => (string)$thesis->barevnost,
            'skoly'                 => (string)$thesis->skoly,
            'jinaSkola'             => (string)$thesis->jinaSkola,
            'fakulty'               => (string)$thesis->fakulty,
            'jinaFakulta'           => (string)$thesis->jinaFakulta,
            'typPrace'              => (string)$thesis->typPrace,
            'jinyTypPrace'          => (string)$thesis->jinyTypPrace,
            'spodniTextVlevo'       => (string)$thesis->spodniTextVlevo,
            'potiskNahore'          => (string)$thesis->potiskNahore,
            'potiskDole'            => (string)$thesis->potiskDole,
            'pocetPevnychDesek'     => (string)$thesis->pocetPevnychDesek,
            'pocetKrouzkovychDesek' => (string)$thesis->pocetKrouzkovychDesek,
            'barvaDesek'            => (string)$thesis->barvaDesek,
            'barvaPisma'            => (string)$thesis->barvaPisma,
            'pocetKapesProCD'       => (string)$thesis->pocetKapesProCD,
            'pocetKapesProPosudek'  => (string)$thesis->pocetKapesProPosudek,
            'kapsaCdVpredu'         => (string)$thesis->kapsaCdVpredu,
            'kapsaPosudekVpredu'    => (string)$thesis->kapsaPosudekVpredu,
            'dobaZhotoveni'         => (string)$thesis->dobaZhotoveni,
            'poznamky'              => (string)$thesis->poznamky,
            'created_at'            => (string)$thesis->created_at,
            'updated_at'            => (string)$thesis->updated_at,
        ];
    }
}
