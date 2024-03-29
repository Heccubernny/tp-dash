@extends('components.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left text-center">
            <h2>TaskPadi</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('students.create') }}">
                Add User</a>
        </div><br>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success"> <span>
        {{ $message }}</span>
</div>
@endif
<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Age</th>
        <th>Action</th>
    </tr> @foreach ($students as $student)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $student->firstname }}</td>
        <td>{{ $student->lastname }}</td>
        <td>{{ $student->age }}</td>
        <td>
            <form action="{{ url('students.destroy',$student->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('students.show',$student->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('students.edit',$student->id) }}">Edit</a>
                @csrf @method('DELETE')
                <button type="submit" onclick="return confirm('Do you really want to delete student!')"
                    class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr> @endforeach
</table>
{{ $students->links('vendor.pagination.custom') }}
@endsection
