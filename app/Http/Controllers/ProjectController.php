<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('projects.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return "project created successfully";
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('projects.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $client)
    {
        return view('projects.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        return "project updated successfully";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        return "project deleted successfully";
    }
}
