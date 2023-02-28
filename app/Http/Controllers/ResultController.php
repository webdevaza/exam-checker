<?php

namespace App\Http\Controllers;

use App\Models\AnswerKey;
use App\Models\Result;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ResultController extends Controller
{   
    public function chooseExam() {
        $testNames = AnswerKey::get(['testName']);
        return view('exam-choose', ['testNames' => $testNames]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): Response
    {
        $validated = $request->validate([
            'userName' => 'required',
            'fullName' => 'required',
            'testName' => 'required'
        ]);
        $answerKey = AnswerKey::where('testName',$request->testName)->get();
        $count = strlen($answerKey[0]->key);
        $keyId = $answerKey[0]->id;
        $testTaker = Result::create($validated);
        return response()->view('answer-sheet',['testTaker'=>$testTaker,'count' => $count,'keyId'=>$keyId]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Result $result)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Result $result)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Gathering answers into a string
        $answers = "";
        $a = 1;
        while ($request->$a) {
            $answers .= $request->$a;
            $a++;
        }

        // Finding the necessary AnswerKey
        $answerKey = AnswerKey::where('id',$request->keyId)->get();

        $count = strlen($answerKey[0]->key);

        // Comparing keys with answers
        $keysArr = str_split($answerKey[0]->key);
        $answersArr = str_split($answers);

        $correctAnswersCount = 0;

        for ($i=0; $i < count($keysArr); $i++) { 
            if ($keysArr[$i] == $answersArr[$i]) {
                $correctAnswersCount++;
            };
        };

        // Saving to Result
        $result = Result::find($id);

        $result->answer = $answers;
        $result->result = $correctAnswersCount;
        
        $result->save();
        
        // Returning results view
        return response()->view('result',['correctCount' => $correctAnswersCount,
                                        'allCount' => $count,
                                        'testName' => $request->testName,
                                        'fullName' => $result->fullName]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Result $result)
    {
        //
    }
}
