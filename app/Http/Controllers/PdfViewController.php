<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class PdfViewController extends Controller
{
    public function pdfView($filename)
    {

        $path = public_path('assets/file/' . $filename);

        if (file_exists($path)) {
            $file = file_get_contents($path);

            return Response::make($file, 200, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="' . $filename . '"',
            ]);
        } else {
            abort(404);
        }
    }
}
