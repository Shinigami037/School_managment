@extends('layouts.admin')

@section('content')
    {{-- <livewire:admin.teacher.index /> --}}
    <div class="row">
        <div class="col-lg-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Class table</h4>
                    <div class="table-responsive pt-3">
                        <p>
                            Students in each class.
                        </p>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    {{-- <th>Id</th> --}}
                                    <th>Class</th>
                                    <th>Section A</th>
                                    <th>Section B</th>
                                    <th>Section C</th>
                                    <th>Max Class Strength</th>
                                    {{-- <th>{{ $values->student }}</th> --}}
                                    {{-- <th>Gender</th> --}}
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < 36; $i += 3)
                                    <tr>
                                        <td>
                                            {{ $values[$i]->name }}
                                        </td>
                                        <td>
                                            {{ $values[$i]->current_value }}
                                        </td>
                                        <td>
                                            {{ $values[$i + 1]->current_value }}
                                        </td>
                                        <td>
                                            {{ $values[$i + 2]->current_value }}
                                        </td>
                                        <td>
                                            {{ $values[$i]->max_value * 3 }}
                                        </td>
                                    </tr>
                                @endfor
                                {{-- @foreach ($values as $data)
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
                                @endforeach --}}
                            </tbody>
                        </table>
                        <div>
                            {{-- <div class="row">{{ $values->links() }}</div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
