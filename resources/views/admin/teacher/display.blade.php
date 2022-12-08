@extends('layouts.admin')

@section('content')
    {{-- <livewire:admin.teacher.index /> --}}

    <div class="row">

        <div class="col-lg-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <h4 class="card-title">Teacher's table</h4>
                        </div>
                        <div class="col-lg-6 float-right">
                            <form action="{{ route('teacher.add_teacher') }}">
                                <button type="submit" class="btn btn-primary me-2 btn-rounded float-end">Add
                                    teacher</button>
                            </form>

                        </div>
                    </div>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Qualification</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Gender</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($values as $data)
                                    <tr>
                                        <td>
                                            {{ $data->teacher_id }}
                                        </td>
                                        <td>
                                            {{ $data->name }}
                                        </td>
                                        <td>
                                            {{ $data->email }}
                                        </td>
                                        <td>
                                            {{ $data->phone }}
                                        </td>
                                        <td>
                                            {{ $data->qualification }}
                                        </td>
                                        <td>
                                            <img src="{{ asset('uploads/teacher/' . $data->img) }}" width="100px"
                                                height="170px" alt="Image" />
                                        </td>
                                        <td>
                                            {{ $data->status == 1 ? 'Active' : 'In Active' }}
                                        </td>
                                        <td>
                                            @if ($data->gender == 1)
                                                Male
                                            @else
                                                Female
                                            @endif
                                        </td>
                                        <td>
                                            @if (Auth::user()->id == $data->tid or Auth::user()->role_as == 0)
                                                <a href="{{ route('teacher.edit_teacher', ['tid' => $data->tid]) }}"
                                                    class="btn btn-success btn-rounded">Edit</a>
                                            @else
                                                No Access
                                            @endif
                                            @if (Auth::user()->role_as == 0)
                                                <a href="{{ route('teacher.delete_teacher', ['tid' => $data->tid]) }}"
                                                    class="btn btn-danger btn-rounded">Delete</a>
                                            @endif
                                        </td>
                                @endforeach
                            </tbody>
                        </table>
                        <div>
                            <div class="row">{{ $values->links() }}</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
