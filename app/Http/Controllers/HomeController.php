<?php
namespace App\Http\Controllers;

use Response;
use Twitter;
use Illuminate\Http\Request;
use \RecursiveArrayIterator;
use \RecursiveIteratorIterator;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class HomeController extends Controller
{
    public function show(){
        return view('dashboard');
    }

    public function process(Request $request){
        // Melakukan Overwrite jika field profil diisi
        if ($request->consumer_key != NULL){
            if ($request->consumer_secret != NULL){
                if ($request->access_token != NULL){
                    if ($request->access_secret != NULL){
                        $consumer_key = $request->consumer_key;
                        $consumer_secret = $request->consumer_secret;
                        $access_token = $request->access_token;
                        $access_secret = $request->access_secret;
                    }
                }
            }
        }

        // Membuat JSON
        $array = array( 
            'algorithm' => $request->algorithm, 
            'spam_keyword'=>$request->spam_keyword,
        );
        $data = json_encode($array);
        $data_twitter = Twitter::getMentionsTimeline(['count' => 20, 'format' => 'json']);

        // Proses
        $process = new Process("python3 hello.py $data $data_twitter");
        $process->run();
        $result = $process->getOutput();
        $result_data = json_decode($result, true);
        
        return view('result', ['data'=>$result_data]);
    }
}