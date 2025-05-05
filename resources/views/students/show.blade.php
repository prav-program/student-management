@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Student Details</h2>
    <div class="card p-4">
        <p><strong>Name:</strong> {{ $student->student_name }}</p>
        <p><strong>Class:</strong> {{ $student->class }}</p>
        <p><strong>Class Teacher:</strong> {{ $student->teacher->teacher_name ?? 'N/A' }}</p>
        <p><strong>Admission Date:</strong> {{ $student->admission_date }}</p>
        <p><strong>Yearly Fees:</strong> {{ $student->yearly_fees }}</p>
    </div>
    <a href="{{ route('students.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection