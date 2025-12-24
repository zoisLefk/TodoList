<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Project;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class TodoController extends Controller
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
        $project = Project::findOrFail($request['project_id']);
        if (! Gate::allows('create-todo', $project)) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        $validated['is_completed'] = FALSE;
        $validated['project_id'] = $request['project_id'];

        $validated['user_id'] = auth()->id();

        $todo = Todo::create($validated);

        return redirect()->route('projects.show', $todo->project_id)
                         ->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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

        $todo = Todo::findOrFail($id);

        if (! Gate::allows('update-todo', $todo)) {
            abort(403);
        }

        $todo->update($request->only('title', 'description'));
        return redirect()
            ->route('projects.show', $todo->project_id)
            ->with('success', 'Task updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $todo = Todo::findOrFail($id);

        $todo = Todo::findOrFail($id);
        if (! Gate::allows('delete-todo', $todo)) {
            abort(403);
        }

        $todo->delete();

        return redirect()->route('projects.show', $todo->project_id)->with('success', 'Task deleted succesfully');
    }

    /**
     * Toggle the is_completed attribute of a task
     */
    public function toggle(string $id) {
        
        $todo = Todo::findOrFail($id);
        if (! Gate::allows('update-todo', $todo)) {
            abort(403);
        }

        $todo->is_completed = !$todo->is_completed;
        $todo->save();

        // return back();
        return redirect()->back();
    }
}
