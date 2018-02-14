<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Thesis\Models\Thesis;
use App\Transformers\Thesis\ThesisTransformer;


class ThesisController extends Controller
{

    private $transformer;

    public function __construct( ){
        $this->transformer = new ThesisTransformer();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        logger($request);
        $thesis = Thesis::create([
            'user_id'               => $request->user_id,
            'typZadani'             => $request->typZadani,
            'price'                 => $request->price,
            'pribliznyPocetListu'   => $request->pribliznyPocetListu,
            'presnyPocetStran'      => $request->presnyPocetStran,
            'typTisku'              => $request->typTisku,
            'barevnost'             => $request->barevnost,
            'skoly'                 => $request->skoly,
            'jinaSkola'             => $request->jinaSkola,
            'fakulty'               => $request->fakulty,
            'jinaFakulta'           => $request->jinaFakulta,
            'typPrace'              => $request->typPrace,
            'jinyTypPrace'          => $request->jinyTypPrace,
            'spodniTextVlevo'       => $request->spodniTextVlevo,
            'potiskNahore'          => $request->potiskNahore,
            'potiskDole'            => $request->potiskDole,
            'pocetPevnychDesek'     => $request->pocetPevnychDesek,
            'pocetKrouzkovychDesek' => $request->pocetKrouzkovychDesek,
            'barvaDesek'            => $request->barvaDesek,
            'barvaPisma'            => $request->barvaPisma,
            'pocetKapesProCD'       => $request->pocetKapesProCD,
            'pocetKapesProPosudek'  => $request->pocetKapesProPosudek,
            'kapsaCdVpredu'         => $request->kapsaCdVpredu,
            'kapsaPosudekVpredu'    => $request->kapsaPosudekVpredu,
            'dobaZhotoveni'         => $request->dobaZhotoveni,
            'poznamky'              => $request->poznamky,
            ]);

        return response($this->transformer->transform($thesis));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id): JsonResponse
    {
        $thesis = Thesis::find($id);

        return $this->repsonse->withItem($thesis, new ThesisTransformer());
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id): JsonResponse
    {
        $thesis = Thesis::find($id);

        $thesis::update([
            'user_id'               => $request->user_id,
            'typZadani'             => $request->typZadani,
            'filePath'              => $request->filePath,
            'price'                 => $request->price,
            'pribliznyPocetListu'   => $request->pribliznyPocetListu,
            'presnyPocetStran'      => $request->presnyPocetStran,
            'typTisku'              => $request->typTisku,
            'barevnost'             => $request->barevnost,
            'skoly'                 => $request->skoly,
            'jinaSkola'             => $request->jinaSkola,
            'fakulty'               => $request->fakulty,
            'jinaFakulta'           => $request->jinaFakulta,
            'typPrace'              => $request->typPrace,
            'jinyTypPrace'          => $request->jinyTypPrace,
            'spodniTextVlevo'       => $request->spodniTextVlevo,
            'potiskNahore'          => $request->potiskNahore,
            'potiskDole'            => $request->potiskDole,
            'pocetPevnychDesek'     => $request->pocetPevnychDesek,
            'pocetKrouzkovychDesek' => $request->pocetKrouzkovychDesek,
            'barvaDesek'            => $request->barvaDesek,
            'barvaPisma'            => $request->barvaPisma,
            'pocetKapesProCD'       => $request->pocetKapesProCD,
            'pocetKapesProPosudek'  => $request->pocetKapesProPosudek,
            'kapsaCdVpredu'         => $request->kapsaCdVpredu,
            'kapsaPosudekVpredu'    => $request->kapsaPosudekVpredu,
            'dobaZhotoveni'         => $request->dobaZhotoveni,
            'poznamky'              => $request->poznamky,
        ]);

        return $this->response->withItem($thesis, new ThesisTransformer());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        $thesis = Thesis::findOrFail($id);
        $thesis->delete();

        return $this->response->withArray([1]);

    }
}
