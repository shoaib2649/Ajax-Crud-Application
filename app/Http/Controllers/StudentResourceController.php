<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        echo 'All data fetch';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('partials.test');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        echo "successfull store the create form";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        echo "yes successfull get the id :$id";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        echo "this is a easy way to edit the file :$id";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
