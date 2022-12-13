@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card" style="border-radius: .5rem;">
                <div class="row">
                    <div class="col-lg-12 float-end" style="padding: 20px">
                        <form action="{{ route('teacher.display_teacher') }}">
                            <button type="submit" class="btn btn-danger me-2 btn-rounded float-end">Back</button>
                        </form>

                    </div>
                </div>
                <div class="row g-0">

                    <div class="col-md-4 text-center"
                        style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                        <img src="{{ asset('uploads/teacher/' . $values->img) }}" width="400px" height="400px"
                            alt="Image" style="padding: 20px;" />
                        <h5>{{ $values->name }}</h5>
                        <p>
                            Teacher
                        </p>
                    </div>
                    <div class="col-lg-8">
                        <div class="card-body p-4">
                            <h6>About Me</h6>
                            <hr class="mt-0 mb-4">
                            <div class="row" style="padding-bottom: 15px; padding-top: 10px">
                                <div class="col-lg-1">
                                    <h6 class="text-muted">Name: </h6>
                                </div>
                                <div class="col-lg-11">
                                    <h5>{{ $values->name }}</h5>
                                </div>
                            </div>
                            <div class="row" style="padding-bottom: 15px; padding-top: 10px">
                                <div class="col-lg-1">
                                    <h6 class="text-muted">Email : </h6>
                                </div>
                                <div class="col-lg-11">
                                    <h5>{{ $values->email }}</h5>
                                </div>
                            </div>
                            <div class="row" style="padding-bottom: 15px; padding-top: 10px">
                                <div class="col-lg-1">
                                    <h6 class="text-muted">Phone No. : </h6>
                                </div>
                                <div class="col-lg-11">
                                    <h5>{{ $values->phone }}</h5>
                                </div>
                            </div>
                            <div class="row" style="padding-bottom: 15px; padding-top: 10px">
                                <div class="col-lg-2">
                                    <h6 class="text-muted">Unique Id : </h6>
                                </div>
                                <div class="col-lg-10">
                                    <h5>{{ $values->teacher_id }}</h5>
                                </div>
                            </div>
                            <div class="row" style="padding-bottom: 15px; padding-top: 10px">
                                <div class="col-lg-2">
                                    <h6 class="text-muted">Qualification : </h6>
                                </div>
                                <div class="col-lg-10">
                                    <h5>{{ $values->qualification }}</h5>
                                </div>
                            </div>
                            <div class="row" style="padding-bottom: 15px; padding-top: 10px">
                                <div class="col-lg-2">
                                    <h6 class="text-muted">Gender : </h6>
                                </div>
                                <div class="col-lg-10">
                                    <h5>
                                        @if ($values->gender == 1)
                                            Male
                                        @else
                                            Female
                                        @endif
                                    </h5>
                                </div>
                            </div>
                            <div class="row" style="padding-bottom: 15px; padding-top: 10px">
                                <div class="col-lg-2">
                                    <h6 class="text-muted">Status : </h6>
                                </div>
                                <div class="col-lg-10">
                                    <h5>{{ $values->status == 1 ? 'Active' : 'In Active' }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
