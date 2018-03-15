<?php

namespace App\Http\Controllers\Api;

use App\Orders\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use League\Csv\Writer;
use Illuminate\Support\Facades\Storage;


class CsvController extends Controller
{
    public function generateCsv($id)
    {
        $order = Order::find($id);
        $folder = storage_path().'/app/public/tmp/';
        $fileName = '/'.$order->id .'_'. $order->orderName.'_'.$order->first_name.'_'.$order->last_name.'_'.str_random(5).'.csv';
        $fileName = str_replace(' ', '_', $fileName);

        if (!is_dir($folder)) {
            Storage::makeDirectory('/public/tmp/', 0775);
        }

        $writer = Writer::createFromPath($folder . $fileName, 'w');
        $writer->insertOne($this->getHeaderAaArray());
        logger($this->getContentAsArray($order));
        $writer->insertOne($this->getContentAsArray($order));

        if ( File::exists($folder.$fileName) ) {
            return response(asset('storage/tmp/').$fileName);
        }

    }

    private function getHeaderAaArray()
    {
        return [
            'uzivatel',
            'objednavka',
            'NahranySoubor',
            'cena',
            'typZadani',
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
            'potiskNahore' ,
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
            'created_at',
            'updated_at'
        ];
    }

    private function getContentAsArray(Order $order)
    {
        return [
            $order->firt_name .' ' .$order->last_name,
            $order->orderName,
            $order->thesis->NahranySoubor,
            $order->thesis->cena,
            $order->thesis->typZadani,
            $order->thesis->pribliznyPocetListu,
            $order->thesis->presnyPocetStran,
            $order->thesis->typTisku,
            $order->thesis->barevnost,
            $order->thesis->skoly,
            $order->thesis->jinaSkola,
            $order->thesis->fakulty,
            $order->thesis->jinaFakulta,
            $order->thesis->typPrace,
            $order->thesis->jinyTypPrace,
            $order->thesis->spodniTextVlevo,
            $order->thesis->potiskNahore,
            $order->thesis->potiskDole,
            $order->thesis->pocetPevnychDesek,
            $order->thesis->pocetKrouzkovychDesek,
            $order->thesis->barvaDesek,
            $order->thesis->barvaPisma,
            $order->thesis->pocetKapesProCD,
            $order->thesis->pocetKapesProPosudek,
            $order->thesis->kapsaCdVpredu,
            $order->thesis->kapsaPosudekVpredu,
            $order->thesis->dobaZhotoveni,
            $order->thesis->poznamky,
            $order->thesis->created_at,
            $order->thesis->updated_at
        ];
    }
}
