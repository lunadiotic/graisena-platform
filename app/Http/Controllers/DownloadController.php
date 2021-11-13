<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function program($file)
    {
        if(Storage::exists("/program/{$file}")) {
            return Storage::download("/program/{$file}");
        }

        return redirect()->back();
    }
}
