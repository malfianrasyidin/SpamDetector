<?php
namespace App\Http\Controllers;

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

        // Menyalin variabel
        $spam_keyword = $request->spam_keyword;
        $algorithm = $request->algorithm;
        $start_datetime = $request->start_datetime;
        $end_datetime = $request->end_datetime;

        // Memilihi jenis algoritma
        switch ($algorithm) {
            case 1: // Algoritma Boyer-Moore
                // $process = new Process("python3 hello.py");
                break;
            case 2: // Algoritma KMP
                // $process = new Process("python3 hello.py");
                break;
            case 3: // Algoritma Regex
                // $process = new Process("python3 hello.py");
                break;
        }

        // $process->run();
        // if (!$process->isSuccessful()) {
        //     throw new ProcessFailedException($process);
        // }
        // $json = json_encode($process->getOutput());
        // $jsonIterator = new RecursiveIteratorIterator(
        //     new RecursiveArrayIterator($json),
        //     RecursiveIteratorIterator::SELF_FIRST);

        return view('result');
    }
}