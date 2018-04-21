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
        // $data_twitter = Twitter::getMentionsTimeline(['count' => 20, 'format' => 'json']);
        // dd($data_twitter);
        // proses
        $process = new Process("python3 hello.py $data");
        $process->run();
        $result = $process->getOutput();
        $result_data = json_decode($result, true);
        // dd($result);

        // Contoh array yang harus didapatkan oleh PHP dari Python
        // $array = array(
        //     '0'=>array(
        //         'username'=>"@malfian_rasyid", 
        //         'message'=>"Bukan SPAM sih yang ini", 
        //         'created_at'=>date('Y-m-d H:i:s'),
        //         'spam_flag'=>0, 
        //     ),
        //     '1'=>array(
        //         'username'=>"@malfianrasyidin", 
        //         'message'=>"Ini seharusnya sih SPAM", 
        //         'created_at'=>date('Y-m-d H:i:s'),
        //         'spam_flag'=>1, 
        //     ),
        // );

        
        return view('result', ['data'=>$result_data]);
    }
}