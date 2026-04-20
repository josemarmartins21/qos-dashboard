<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return view('subjects.index', compact('subjects'));
    }

    public function create()
    {
        return view('subjects.create');
    }

    public function edit(Subject $subject)
    {
        return view('subjects.edit', compact('subject'));
    }

    public function store(Request $request)
    {
        try {
            $validator = $this->validate($request);

            if ($validator->fails()) {
                return redirect()->back()->withInput()
                        ->withErrors($validator->errors());
            }
    
            $validated = $validator->validated();
            
            Subject::create([
                'subject' => $validated['subject'],
                'user_id' => Auth::user()->id,
            ]);
    
            return redirect()->route('subjects.index');
            
        } catch (\Throwable $e) {
            dd($e->getMessage());
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function update(Subject $subject, Request $request)
    {
        try {

            $validator = $this->validate($request);
    
            if ($validator->fails()) {
                return redirect()->back()->withInput()
                        ->withErrors($validator->errors());
            }

            $newSubject = $validator->safe(['subject']); 

            $subject->update([
                'subject' => $newSubject['subject'],
            ]);
    
            return redirect()->route('subjects.index');
            
        } catch (\Throwable $e) {
            dd($e->getMessage());
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect()->route('subjects.index');
    }

    private function validate(Request $request)
    {
        return Validator::make($request->all(),[
            'subject' => 'required|string|max:50',
        ], [], [
            'subject' => 'assunto',
        ]);
    }
}
