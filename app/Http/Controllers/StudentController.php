<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::with('teacher');

        // Search filter
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('student_name', 'like', "%$search%")
                  ->orWhere('class', 'like', "%$search%");
            });
        }

        // Show all including trashed (optional)
        if ($request->has('with_trashed')) {
            $query->withTrashed();
        }

        $students = $query->orderBy('id', 'desc')->paginate(10);

        return view('students.index', compact('students'));
    }

    public function create()
    {
        $teachers = Teacher::all();
        return view('students.create', compact('teachers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_name' => 'required|string|max:255',
            'class' => 'required|string|max:100',
            'class_teacher_id' => 'required|exists:teachers,id',
            'admission_date' => 'required|date',
            'yearly_fees' => 'required|numeric',
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')->with('success', 'Student added successfully.');
    }

    public function edit(Student $student)
    {
        $teachers = Teacher::all();
        return view('students.edit', compact('student', 'teachers'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'student_name' => 'required|string|max:255',
            'class' => 'required|string|max:100',
            'class_teacher_id' => 'required|exists:teachers,id',
            'admission_date' => 'required|date',
            'yearly_fees' => 'required|numeric',
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        $student->delete(); // soft delete
        return redirect()->route('students.index')->with('success', 'Student deleted (soft) successfully.');
    }

    public function restore($id)
    {
        $student = Student::onlyTrashed()->findOrFail($id);
        $student->restore();
        return redirect()->route('students.index')->with('success', 'Student restored successfully.');
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }
}
