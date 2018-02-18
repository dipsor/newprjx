<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Thesis\Models\Thesis;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        $this->validate($request, [
           'file' => 'required'
        ]);

        if (null !== $request->header('thesisid') && !empty($request->header('thesisid'))) {
            $thesisId = $request->header('thesisid');
        }

        $path = $request->file('file')->store('pdf');

        $thesis = Thesis::find($thesisId);
        $thesis->update([
           'filePath' => $path
        ]);

        return response($path, 200);

    }
}
