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
    public function index(): Response
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): Response
    {
        $validated = $request->validate([
            'userName' => 'required|unique:results,userName',
            'fullName' => 'required',
            'testName' => 'required'
        ]);
        $answerKey = AnswerKey::where('testName',$request->testName)->get();
        $count = strlen($answerKey[0]->key);
        $result = Result::create($validated);
        return response()->view('answer-sheet',['result'=>$result,'count' => $count]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Result $result): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Result $result): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $answers = "";
        $a = 1;
        while ($request->$a) {
            $answers .= $request->$a;
            $a++;
        }
        $result = Result::find($id);
        $result->answer = $answers;
        $result->save();
        return response()->redirectToRoute('choose-exam');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Result $result): RedirectResponse
    {
        //
    }
}
