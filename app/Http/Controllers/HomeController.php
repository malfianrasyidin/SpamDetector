<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \RecursiveIteratorIterator;
use \RecursiveArrayIterator;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class HomeController extends Controller
{
    public function index(){
        // $process = new Process("python3 hello.py");
        // $process->run();

        // // executes after the command finishes
        // if (!$process->isSuccessful()) {
        //     throw new ProcessFailedException($process);
        // }
        // $json = json_encode($process->getOutput());
        // // dd($json);
        // $jsonIterator = new RecursiveIteratorIterator(
        //     new RecursiveArrayIterator($json),
        //     RecursiveIteratorIterator::SELF_FIRST);

        // foreach ($jsonIterator as $key => $val) {
        //     if(is_array($val)) {
        //         echo "$key:\n";
        //     } else {
        //         echo "$key => $val\n";
        //     }
        // }
        return view('dashboard');
    }

    public function show(){
        return view('result');
    }
}