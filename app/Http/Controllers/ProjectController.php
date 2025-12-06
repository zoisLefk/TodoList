<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Gate;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        $validated['user_id'] = auth()->id();

        $project = Project::create($validated);

        return redirect()->route('dashboard', $project)
                         ->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = auth()->user()->projects()->findOrFail($id);

        if (! Gate::allows('view-project', $project)) {
            abort(403);
        }

        return view('projects.show', [ "project" => $project ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $project = Project::findOrFail($id);

        if (! Gate::allows('update-project', $project)) {
            abort(403);
        }

        $project->update($request->only('title', 'description'));
        return redirect()
            ->route('dashboard')
            ->with('success', 'Task updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);
        if (! Gate::allows('delete-project', $project)) {
            abort(403);
        }
        $project->delete();

        return redirect()->route('dashboard', $project)
                         ->with('success', 'Project deleted successfully.'); 
    }
}
