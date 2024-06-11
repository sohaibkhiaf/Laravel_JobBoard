<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{

    public function index()
    {
        $this->authorize('viewAny' , Work::class);

        $filters = request()->only( ['search' , 'min_salary' , 'max_salary' , 'experience' , 'category']);
        return view('works.index' , ['works' => Work::with('employer')->filter($filters)->latest()->get()]);
    } 

    public function show(Work $work)
    {
        $this->authorize('view' , $work);

        return view('works.show', ['work'=> $work->load('employer.works')]);
    }

}
