@extends('layouts.admin')

@section('content')
    {{-- <livewire:admin.teacher.index /> --}}

    <form action="{{ route('teacher.update_status') }}" method="POST">
        @csrf
        <div class="modal fade" id="statusModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Status</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="status_id" id="status_id">
                        Are you sure you want to change the Status of Teacher.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NO</button>
                        <button type="submit" class="btn btn-success">YES</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <form action="{{ route('teacher.delete_teacher') }}" method="POST">
        @csrf
        <div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="user_id" id="user_id">
                        Are you sure you want to delete the Teacher.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NO</button>
                        <button type="submit" class="btn btn-danger">YES</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="row">
        <div class="col-lg-12 stretch-card">
            <div class="card">
                <div class="row">
                    @if (Session::has('message'))
                        <p class="alert alert-success">{{ Session::get('message') }}</p>
                    @endif
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <h4 class="card-title">Teacher's table</h4>
                        </div>
                        {{-- <div class="col-lg-3"> --}}
                        <form action="" class="col-lg-4">
                            <div class="input-group">
                                <div class="form-outline">
                                    <input type="search" name="search" id="" class="form-control"
                                        style="color: #aab2bd" value="{{ $search }}">
                                    {{-- <button class="btn btn-primary me-2 btn-rounded float-end"><i
                                        class="mdi mdi-magnify"></i></button> --}}
                                </div>
                                {{-- <div class="form-group"> --}}
                                <button class="btn btn-primary float-end"><i class="mdi mdi-magnify"></i></button>
                            </div>
                        </form>
                        {{-- </div> --}}
                        <div class="col-lg-2 float-right">
                            @if (Auth::check())
                                @if (Auth::user()->role_as == 0)
                                    <form action="{{ route('teacher.add_teacher') }}">
                                        <button type="submit" class="btn btn-primary me-2 btn-rounded float-end">Add
                                            teacher</button>
                                    </form>
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    {{-- <th>Phone</th>
                                    <th>Qualification</th> --}}
                                    <th>Image</th>
                                    <th>Status</th>
                                    {{-- <th>Gender</th> --}}
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
                                        {{-- <td>
                                            {{ $data->phone }}
                                        </td>
                                        <td>
                                            {{ $data->qualification }}
                                        </td> --}}
                                        <td>
                                            <img src="{{ asset('uploads/teacher/' . $data->img) }}" width="100px"
                                                height="170px" alt="Image" />
                                        </td>
                                        <td>
                                            <button type="button" class="btn changeStatusBtn" value="{{ $data->id }}">
                                                {{ $data->status == 1 ? 'Active' : 'In Active' }}
                                            </button>
                                        </td>
                                        {{-- <td>
                                            @if ($data->gender == 1)
                                                Male
                                            @else
                                                Female
                                            @endif
                                        </td> --}}
                                        <td>
                                            <button type="button" class="btn mdi mdi-eye mdi-24px"
                                                style="color: rgb(99, 104, 103)"
                                                onclick="window.location='{{ route('teacher.viewCard_teacher') }}'">
                                            </button>
                                            @if (Auth::user()->id == $data->tid or Auth::user()->role_as == 0)
                                                <button type="button" class="btn mdi mdi-account-edit mdi-24px"
                                                    value="{{ $data->id }}" style="color: rgb(80, 225, 80)"
                                                    onclick="window.location='{{ route('teacher.edit_teacher', ['tid' => $data->tid]) }}'">
                                                    {{-- <a href="{{ route('teacher.edit_teacher', ['tid' => $data->tid]) }}"
                                                        style="color: rgb(80, 225, 80)"></a> --}}
                                                </button>
                                            @endif
                                            @if (Auth::user()->role_as == 0)
                                                <button type="button" class="btn deleteUserBtn mdi mdi-delete mdi-24px"
                                                    value="{{ $data->tid }}" style="color: rgb(250, 32, 32)">
                                                </button>
                                                {{-- <a href="{{ route('teacher.delete_teacher', ['tid' => $data->tid]) }}"
                                                    class="mdi mdi-delete mdi-24px" style="color: rgb(250, 32, 32)"></a> --}}
                                            @endif
                                        </td>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- {{ $curr }} --}}
                        <div>
                            <div class="row">{{ $values->links() }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.changeStatusBtn').click(function(e) {
                e.preventDefault();

                var user_id = $(this).val();
                $('#status_id').val(user_id);
                $('#statusModal').modal('show');
            });
            $('.deleteUserBtn').click(function(e) {
                e.preventDefault();

                var user_id = $(this).val();
                $('#user_id').val(user_id);
                $('#deleteModal').modal('show');
            });
        });
    </script>
@endsection
