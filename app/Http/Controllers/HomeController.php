<?php
namespace App\Http\Controllers;

use Storage;
use Twitter;
use Illuminate\Http\Request;
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

        // Menulis informasi data ke dalam berkas JSON
        $data = array( 
            'algorithm' => $request->algorithm, 
            'spam_keyword'=>$request->spam_keyword,
        );
        $path = storage_path() . "/json/data.json";
        file_put_contents($path, json_encode($data));

        // Menulis data dari Twitter ke dalam berkas JSON
        $data_twitter = Twitter::getMentionsTimeline(['count' => 20, 'format' => 'json']);
        $path_twitter = storage_path() . "/json/data_twitter.json";
        file_put_contents($path_twitter, $data_twitter);

        // Memproses algoritma
        try {
            $process = new Process("python3 hello.py");
            $process->mustRun();
        } catch (ProcessFailedException $exception) {
            echo $exception->getMessage();
        }

        // Membaca hasil
        $path_result = storage_path() . "/json/result.json";
        $result_data = json_decode(file_get_contents($path_result), true);
        
        // dd($result);

        return view('result', ['data'=>$result_data]);
    }
}