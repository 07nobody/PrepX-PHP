<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Question;

class TestController extends Controller
{
    public function create(Request $request)
    {
        $test = new Test();
        $test->title = $request->input('title');
        $test->description = $request->input('description');
        $test->duration = $request->input('duration');
        $test->created_by = auth()->user()->id;
        $test->save();

        return redirect()->route('tests.index')->with('success', 'Test created successfully.');
    }

    public function edit($id)
    {
        $test = Test::findOrFail($id);
        return view('tests.edit', compact('test'));
    }

    public function update(Request $request, $id)
    {
        $test = Test::findOrFail($id);
        $test->title = $request->input('title');
        $test->description = $request->input('description');
        $test->duration = $request->input('duration');
        $test->save();

        return redirect()->route('tests.index')->with('success', 'Test updated successfully.');
    }

    public function verify($id)
    {
        $test = Test::findOrFail($id);
        $test->verified = true;
        $test->save();

        return redirect()->route('tests.index')->with('success', 'Test verified successfully.');
    }
}
