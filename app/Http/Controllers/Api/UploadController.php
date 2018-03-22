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

        $filename = str_replace(' ', '_', $request->file('file')->getClientOriginalName());
        $hashedName = md5($filename).'.'.$request->file('file')->getClientOriginalExtension();
        $request->file('file')->storeAs('public/pdf', $hashedName);

        $thesis = Thesis::find($thesisId);
        $thesis->update([
           'filePath' => $hashedName,
            'originalFileName' => $filename,
        ]);

        return response($filename, 200);

    }
}
