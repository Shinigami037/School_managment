@extends('layouts.admin')

@section('content')
    {{-- <livewire:admin.teacher.index /> --}}
    <div class="row">
        <div class="col-lg-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <h4 class="card-title">Class Table's</h4>
                        </div>
                        <div class="col-lg-6 float-end">
                            <form action="{{ route('class.class_add') }}">
                                <button type="submit" class="btn btn-primary me-2 btn-rounded float-end">Add
                                    Class</button>
                            </form>

                        </div>
                    </div>
                    <div class="table-responsive pt-3">
                        <p>
                            Students in each class.
                        </p>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    {{-- <th>Id</th> --}}
                                    <th>Class</th>
                                    <th>Section</th>
                                    <th>Current Strength</th>
                                    <th>Max Class Strength</th>
                                    <th>Action</th>
                                    {{-- <th>{{ $values->student }}</th> --}}
                                    {{-- <th>Gender</th> --}}
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @php

                                    $prev = $values[0]->className;
                                    echo '<tr>';
                                    echo '<td>' . $prev . '</td>';
                                    echo '<td>' . $values[0]->name . '</td>';
                                    echo '<td>' . $values[0]->current_students . '</td>';
                                    echo '<td>' . $values[0]->max_students . '</td>';
                                    echo '<td>';
                                    // echo $values[0]->sid;
                                    if (Auth::user()->role_as == 1 or Auth::user()->role_as == 0) {
                                        echo '<a href="' . route('class.class_editDisplay', ['id' => $values[0]->sid]) . '"class="btn btn-success btn-rounded">Edit</a>';
                                    }
                                    // if (Auth::user()->role_as == 0) {
                                    //     echo '<a href="' . route('class.class_delete', ['id' => $values[0]->sid]) . '"class="btn btn-danger btn-rounded">Delete</a>';
                                    // }
                                    echo '</td>';
                                    echo '</tr>';

                                    for ($i = 1; $i < sizeof($values); $i++) {
                                        echo '<tr>';
                                        if ($prev == $values[$i]->className) {
                                            echo '<td></td>';
                                            echo '<td>' . $values[$i]->name . '</td>';
                                            echo '<td>' . $values[$i]->current_students . '</td>';
                                            echo '<td>' . $values[$i]->max_students . '</td>';
                                        } else {
                                            $prev = $values[$i]->className;
                                            echo '<td>' . $prev . '</td>';
                                            echo '<td>' . $values[$i]->name . '</td>';
                                            echo '<td>' . $values[$i]->current_students . '</td>';
                                            echo '<td>' . $values[$i]->max_students . '</td>';
                                        }
                                        echo '<td>';
                                        // echo $values[0]->sid;
                                        if (Auth::user()->role_as == 0 or Auth::user()->role_as == 0) {
                                            echo '<a href="' . route('class.class_editDisplay', ['id' => $values[$i]->sid]) . '"class="btn btn-success btn-rounded">Edit</a>';
                                        }
                                        // if (Auth::user()->role_as == 0) {
                                        // echo '<a href="' . route('class.class_delete', ['id' => $values[$i]->sid]) . '"class="btn btn-danger btn-rounded">Delete</a>';
                                        // }
                                        echo '</td>';
                                        echo '</tr>';
                                    }
                                @endphp
                                {{-- @foreach ($values as $data)
                                    <tr>
                                        <td>
                                            {{ $data->className }}
                                        </td>
                                        <td>
                                            {{ $data->name }}
                                        </td>
                                        <td>
                                            {{ $data->current_students }}
                                        </td>
                                        <td>
                                            {{ $data->max_students }}
                                        </td>
                                        <td>
                                            {{ $data->max_value * 3 }}
                                        </td>
                                    </tr>
                                @endforeach --}}
                                {{-- <tr>
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
                                @endfor --}}
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
                            <div class="row">{{ $values->links() }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
