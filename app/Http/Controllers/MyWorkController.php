<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyWorkController extends Controller
{

    public function index()
    {
        return view('my_work.index');
    }

    public function create()
    {
        return view('my_work.create');
    }

    public function store(Request $request)
    {
        //
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
