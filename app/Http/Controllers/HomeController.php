<?php
namespace App\Http\Controllers;

use Response;
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
        // Data default
        $consumer_key = '5p9RJNvDY6g7X7iqQvzuGVcHv';
        $consumer_secret = 'FWn4OZIbtJjs6qEErvX9R0fYX0FN84XP72eMjO2zdJUODBxtxK';
        $access_token = '197745421-LgYMwS7PtHSSxLFATSlceRsdpMaCA9qf1dtz5t9v';
        $access_secret = 'huq48ZjymfCQZcudTyq0zGeHehloz8jgmHFWhg4lQcMiv';

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
        $array = array('consumer_key'=>$consumer_key, 'consumer_secret'=>$consumer_secret, 'access_token'=>$access_token, 'access_secret'=>$access_secret, 'spam_keyword' => $request->spam_keyword, 'algorithm' => $request->algorithm, 'start_datetime' => $request->start_datetime, 'end_datetime' => $request->end_datetime,
        );
        $data = json_encode($array);

        // Memilih jenis algoritma
        switch ($request->algorithm) {
            case 1: // Algoritma Boyer-Moore
                $process = new Process("python3 hello.py '$data'");
                $process->run();
                $result = $process->getOutput();
                $result_data = json_decode($result, true);
                // dd($result);

                break;
            case 2: // Algoritma KMP
                
                break;
            case 3: // Algoritma Regex
                
                break;
        }

        // Contoh array yang harus didapatkan oleh PHP dari Python
        $array = array(
            '0'=>array(
                'username'=>"@malfian_rasyid", 
                'message'=>"Bukan SPAM sih yang ini", 
                'created_at'=>date('Y-m-d H:i:s'),
                'spam_flag'=>0, 
            ),
            '1'=>array(
                'username'=>"@malfianrasyidin", 
                'message'=>"Ini seharusnya sih SPAM", 
                'created_at'=>date('Y-m-d H:i:s'),
                'spam_flag'=>1, 
            ),
        );
        $result_data = json_decode(json_encode($array),true);
        
        return view('result', ['data'=>$result_data]);
    }
}