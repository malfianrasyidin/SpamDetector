<?php
namespace App\Http\Controllers;

Use Alert;
use Config;
use Storage;
use Twitter;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class HomeController extends Controller
{
    public function show(){
        return view('dashboard');
    }

    public function process(Request $request){
        // Melakukan validasi form
        if ($request->algorithm == NULL || $request->spam_keyword == NULL || $request->total == NULL){
            alert()->error('Oops!', 'Terdapat isian yang belum diisi');
            return Redirect::back()->withInput();
        } else if ($request->total<1 || $request->total>200){
            alert()->error('Oops!', 'X harus dalam rentang 1 - 200');
            return Redirect::back()->withInput();
        }

        // Melakukan Overwrite jika field profil diisi
        if ($request->consumer_key != NULL){
            if ($request->consumer_secret != NULL){
                if ($request->access_token != NULL){
                    if ($request->access_secret != NULL){
                        Config::set([
                            'ttwitter.CONSUMER_KEY' => $request->consumer_key,
                            'ttwitter.CONSUMER_SECRET' => $request->consumer_secret,
                            'ttwitter.ACCESS_TOKEN' => $request->access_token,
                            'ttwitter.ACCESS_TOKEN_SECRET' => $request->access_secret,
                        ]);
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

        // Mendapatkan data dari API Twitter
        try{
            $api_data = Twitter::getMentionsTimeline(['count' => 200]);
            $data_twitter = array_slice($api_data, 0, $request->total);
        } catch (\Throwable $e){
            alert()->error('Oops!', $e->getMessage());
            return Redirect::back()->withInput();
        }
        
        // Menulis data dari Twitter ke dalam berkas JSON
        $path_twitter = storage_path() . "/json/data_twitter.json";
        file_put_contents($path_twitter, json_encode($data_twitter));

        // Memproses algoritma
        try {
            $process = new Process("python3 Program.py");
            $process->mustRun();
        } catch (ProcessFailedException $exception) {
            echo $exception->getMessage();
        }

        // Membaca hasil
        $path_result = storage_path() . "/json/result.json";
        $result_data = json_decode(file_get_contents($path_result), true);

        return view('result', ['result'=>$result_data]);
    }
}