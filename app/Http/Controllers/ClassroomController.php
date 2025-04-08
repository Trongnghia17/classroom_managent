<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Classroom::where('user_id', auth()->id());

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('grade_level', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $classrooms = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('classrooms.index', compact('classrooms', 'search'));
    }
    public function create()
    {
        return view('classrooms.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'grade_level' => 'required|string|max:255',
            'capacity' => 'nullable|integer|min:1',
            'description' => 'nullable|string',
        ]);

        $classroom = new Classroom();
        $classroom->name = $validated['name'];
        $classroom->description = $validated['description'];
        $classroom->grade_level = $validated['grade_level'];
        $classroom->capacity = $validated['capacity'];
        $classroom->user_id = auth()->id();
        $classroom->save();

        return redirect()->route('classrooms.index')->with('success', 'Classroom created successfully');
    }
    public function edit(Classroom $classroom)
    {
        return view('classrooms.edit', compact('classroom'));
    }

    /**
     * Update the specified classroom in storage.
     */
    public function update(Request $request, Classroom $classroom)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'grade_level' => 'required|string|max:255',
            'capacity' => 'nullable|integer|min:1',
            'description' => 'nullable|string',
        ]);

        $classroom->update($validated);

        return redirect()->route('classrooms.index')
            ->with('success', 'Classroom updated successfully');
    }
    public function destroy(Classroom $classroom)
    {
        $classroom->delete();

        return redirect()->route('classrooms.index')
            ->with('success', 'Classroom deleted successfully');
    }

}
