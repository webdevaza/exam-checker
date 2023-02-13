<?php

namespace App\Http\Controllers;

use App\Models\AnswerKey;
use Illuminate\Http\Request;

class AnswerKeyController extends Controller
{
    public $qCount = 0;

    public function questionNumber (Request $request) {
        $examDetails = [$request->examName, $request->qCount];
        $qCount = $request->qCount;
        return view('add-exam',compact('examDetails'));
    }

    public function store (AnswerKey $answerKey, Request $request) {
        $keys = [];
        $a = 1;
        dd($request->q-$a);
        while ($request->q-$a) {
           array_push($keys,$request->q-'$a');
           $a++;
        }
    }
}
