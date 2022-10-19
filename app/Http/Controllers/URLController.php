<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;

class URLController extends Controller
{
    /**
     * 
     * @param Illuminate\Http\Request Request
     * @return Illuminate\Http\Response Response
     *  
    */
    public function list(Request $request){
        $urls = Url::all();
        return response()->json($urls);

    }

    /**
     * 
     * @param Illuminate\Http\Request Request
     * @return Illuminate\Http\Response Response
     *  
    */    
    public function store(Request $request){
        $input = $request->all();
        $new_url = Url::create($input)  ;
        return response()->json($new_url);
    }

    /**
     * 
     * @param Illuminate\Http\Request Request
     * @return Illuminate\Http\Response Response
     *  
    */
    public function show(Request $request , $id){
        $url = Url::find($id);
        return response()->json($url);
    }
    
    /**
     * 
     * @param Illuminate\Http\Request Request
     * @return Illuminate\Http\Response Response
     *  
    */
    public function update(Request $request, $id){
        $url = Url::find($id);
        if ($url == null){
            return response()->json(["message"=>"url not found"]);
        }
        $input = $request->all();
        $url->url = $input["url"];
        $url->save();
        return response()->json(["messag"=>"updated successfully"]);
    }

    /**
     * 
     * @param Illuminate\Http\Request Request
     * @return Illuminate\Http\Response Response
     *  
    */
    public function destroy(Request $request, $id){
        $url = Url::find($id);
        $url->delete();
        return response()->json(["messag"=>"deleted"]);
    }

}
