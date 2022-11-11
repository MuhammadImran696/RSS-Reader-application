<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Models\Url;
use App\Models\RssItem;

class RssItemsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $urls;

    public function __construct($urls)
    {
        $this->urls =  $urls;
// dd($this->urls);
    }

    /**
     * Execute the job.
     *
     * 
     */
    public function handle()
    {
       
        DB::table('rss_items')->truncate();
        
$urls = $this->urls;

        $response = Http::post(env("RSS_PARSER_URL", "http://localhost:5000/getdata"), ["urls" => $urls])->json();
//    dd($response);
        foreach($response['items'] as $post){
        $id = Url::where('url', $post['SourceURL'])->value('id');
        // dd($id);
         RssItem::create([
            'Title'=>$post['Title'],
            'source'=>$post['Source'],
            'sourceUrl'=>$post['SourceURL'],
            'link'=>$post['Link'],

            'publishDate'=>$post['PublishDate'],
            'description'=>$post['Description'],
            'url_id'=>$id
         ]);
    }

    return $response;
    }

    public function getResponse(){
    return $this->response;
}

}
