<?php

namespace App\Http\Controllers;

use App\Models\AnswerKey;
use Illuminate\Http\Request;

class AnswerKeyController extends Controller
{
    public function questionNumber (Request $request) {
        $examDetails = [$request->examName, $request->qCount];
        $qCount = $request->qCount;
        return view('add-exam',compact('examDetails'));
    }

    public function store (Request $request) {
        $key = "";
        $a = 1;
        while ($request->$a) {
            $key .= $request->$a;
            $a++;
        }
        $name = $request->testName;
        AnswerKey::create([
            'testName' => $name,
            'key' => $key
        ]);

        return redirect()->route('add-qcount')->with('success', $name.' was successfully stored');
    }
}
