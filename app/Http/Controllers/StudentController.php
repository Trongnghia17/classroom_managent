<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Student::with('classroom');

        // Search functionality
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('address', 'like', "%{$search}%");
            });
        }

        // Filter by classroom if provided
        if ($request->has('classroom_id') && $request->classroom_id) {
            $query->where('classroom_id', $request->classroom_id);
        }

        // Get paginated results
        $students = $query->paginate(15);
        $students->appends($request->all()); // Maintain search parameters in pagination links

        // Get all classrooms for the filter dropdown
        $classrooms = Classroom::all();

        return view('students.index', compact('students', 'classrooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classrooms = \App\Models\Classroom::all();
        return view('students.create', compact('classrooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'nullable|email',
            'date_of_birth' => 'nullable|date',
            'phone' => 'nullable',
            'address' => 'nullable',
            'classroom_id' => 'required|exists:classrooms,id',
        ]);

        $student = Student::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'date_of_birth' => $validated['date_of_birth'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'classroom_id' => $validated['classroom_id'],
        ]);

        return redirect()->route('students.index')
            ->with('success', 'Thêm học sinh thành công.');
    }
    public function edit(Student $student)
    {
        $classrooms = Classroom::all();
        return view('students.edit', compact('student', 'classrooms'));
    }

    /**
     * Update the specified student in storage.
     */
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,'.$student->id,
            'date_of_birth' => 'required|date',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'classroom_id' => 'nullable|exists:classrooms,id',
        ]);

        $student->update($validated);

        return redirect()->route('students.index')
            ->with('success', 'Student updated successfully');
    }

    /**
     * Remove the specified student from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Student deleted successfully');
    }
}
