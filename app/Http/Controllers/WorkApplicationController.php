<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;

class WorkApplicationController extends Controller
{

    public function create(Work $work)
    {
        $this->authorize( 'apply' , $work);
        
        return view('work_application.create' , ['work' => $work]);
    }

    public function store(Work $work , Request $request)
    {
        $this->authorize( 'apply' , $work);

        $validatedData = $request->validate([
            'expected_salary'=> 'required|min:1|max:1000000',
            'cv' => 'required|file|mimes:pdf',
        ]);

        $file = $request->file('cv');
        $path = $file->store('cvs' , 'private');

        $work->workApplications()->create([
            'user_id' => $request->user()->id,
            'expected_salary' => $validatedData['expected_salary'],
            'cv_path' => $path,
        ]);

        return redirect()->route('works.show' , ['work' => $work])->with('success','Job application submitted.');
    }

}
