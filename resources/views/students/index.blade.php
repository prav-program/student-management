@extends('layouts.app')

@section('content')
<div class="container">
{{-- Success Message --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <h2 class="mb-4">Student List</h2>
    <a href="{{ route('students.create') }}" class="btn btn-success mb-3">Add Student</a>

    <table class="table table-bordered" id="students-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Student Name</th>
            <th>Class</th>
            <th>Class Teacher</th>
            <th>Admission Date</th>
            <th>Yearly Fees</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($students as $student)
        <tr>
            <td>{{ $student->id }}</td>
            <td>{{ $student->student_name }}</td>
            <td>{{ $student->class }}</td>
            <td>{{ $student->teacher->teacher_name ?? 'N/A' }}</td>
            <td>{{ $student->admission_date }}</td>
            <td>{{ $student->yearly_fees }}</td>
            <td>
                @if ($student->trashed())
                    <form action="{{ route('students.restore', $student->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button class="btn btn-warning btn-sm">Restore</button>
                    </form>
                @else
                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Soft delete this student?')" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $('#students-table').DataTable();
    });
</script>
@endpush
