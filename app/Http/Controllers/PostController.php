<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    //
    public function GetPosts(Request $request)
    {
        $urls = $request->get("urls");
        // dd($urls);
        $response = Http::post(env("RSS_PARSER_URL", "http://localhost:5000/getdata"), ["urls" => $urls]);
        return $response->json();
    }
}
