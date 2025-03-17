<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Result;

class ResultController extends Controller
{
    /**
     * Store a newly created result in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'test_id' => 'required|exists:tests,id',
            'score' => 'required|numeric',
        ]);

        $result = Result::create($validatedData);

        return response()->json(['message' => 'Result stored successfully', 'result' => $result], 201);
    }

    /**
     * Display the specified result.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = Result::findOrFail($id);

        return view('results.show', compact('result'));
    }
}
