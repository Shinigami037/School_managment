@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">

            <div class="card">
                <div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <h4 class="card-title">Add Teacher</h4>
                        </div>
                        <div class="col-lg-6 float-end">
                            <form action="{{ route('teacher.display_teacher') }}">
                                <button type="submit" class="btn btn-danger me-2 btn-rounded float-end">Back</button>
                            </form>

                        </div>
                    </div>
                    {{-- <h4 class="card-title">Add Teacher</h4> --}}

                    <form class="forms-sample" action="{{ route('teacher.add_teacher_form') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input name="name" type="text" class="form-control" id="exampleInputName1"
                                placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail3">Email address</label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail3"
                                placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword4">Password</label>
                            <input name="password" type="password" class="form-control" id="exampleInputPassword4"
                                placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputMobile">Mobile</label>
                            <input name="phone" type="tel" class="form-control" id="exampleInputMobile"
                                placeholder="Mobile number" required>
                        </div>
                        <div class="form-group">
                            <label>Photo</label>
                            <input type="file" name="img" class="form-control" required>

                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <select name="gender[]" class="form-control" required>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1">Qualification</label>
                            <textarea name="qualification" class="form-control" id="exampleTextarea1" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary me-2 btn-rounded">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
