<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        $news  = Section::where('type','news')->first();
        $abouts = Section::where('type','about')->first();
        $services = Section::where('type','service')->first();
        $respons  = Section::where('type','respons')->first();

        return response()->view('sitemap.index', [
            'news' => $news,'abouts' => $abouts, 'services' => $services,'respons' => $respons,
        ])->header('Content-Type', 'text/xml');
    }
}
