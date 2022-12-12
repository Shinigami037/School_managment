@extends('layouts.admin')

@section('content')
    {{-- <livewire:admin.teacher.index /> --}}

    <div class="row">

        <div class="col-lg-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <h4 class="card-title">All Students</h4>
                        </div>
                        <div class="col-lg-6 float-right">
                            <form action="{{ route('student.student_add') }}">
                                <button type="submit" class="btn btn-primary me-2 btn-rounded float-end">Add
                                    student</button>
                            </form>

                        </div>
                    </div>

                    <div class="table-responsive pt-3">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    {{-- <th>Gender</th> --}}
                                    <th>Class</th>
                                    <th>Section</th>
                                    <th>Email</th>
                                    {{-- <th>Phone</th> --}}
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @include('admin.student.table')
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
