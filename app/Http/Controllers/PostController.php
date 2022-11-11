<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Bus;
use App\Models\Url;
use App\Jobs\RssItemsJob;

use App\Models\RssItem;

class PostController extends Controller
{
    
    public function GetPosts(Request $request)
    {
        $urls = $request->get("urls");
        
        $Job = new RssItemsJob($urls);
$response = $Job->handle();

return $response;
        

    }
}
