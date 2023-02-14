<?php

namespace App\Http\Controllers;

use App\Models\AnswerKey;
use Illuminate\Http\Request;

class AnswerKeyController extends Controller
{
    public function index() {
        $tests = AnswerKey::all();

        return response()->view('exams-list', ['tests' => $tests]);
    }

    public function addExam (Request $request) {
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

        return response()->redirectToRoute('exam.index')->with('success', $name.' was successfully stored');
    }

    public function edit(AnswerKey $test) {
        
        
        $keys = str_split($test->key);
        return response()->view('edit-exam', ['keys' => $keys]);
    }
}
