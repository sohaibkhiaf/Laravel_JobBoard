<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkRequest;
use App\Models\Work;
use Illuminate\Http\Request;

class MyWorkController extends Controller
{

    public function index()
    {
        $this->authorize('viewAnyEmployer' , Work::class);

        return view('my_work.index' , [
            'works' => auth()->user()->employer->works()
                        ->with(['employer', 'workApplications', 'workApplications.user',] )
                        ->get()
        ]);
    }

    public function create()
    {
        $this->authorize('create' , Work::class);

        return view('my_work.create');
    }

    public function store(WorkRequest $request)
    {
        $this->authorize('create' , Work::class);

        auth()->user()->employer->works()->create( $request->validated() );

        return redirect()->route('works.index')
            ->with('success', 'Job created successfully');
    }


    public function edit(Work $myWork)
    {
        $this->authorize('update' , $myWork);

        return view('my_work.edit' , ['work' => $myWork]);
    }


    public function update(WorkRequest $request, Work $myWork)
    {
        $this->authorize('update' , $myWork);

        $myWork->update( $request->validated() );

        return redirect()->route('works.index')
            ->with('success', 'Job updated successfully');
    }

    public function destroy(Work $myWork)
    {
        //
    }
}
