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
                        @if (Session::has('message'))
                            <p class="alert alert-info">{{ Session::get('message') }}</p>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <h4 class="card-title">Add Class</h4>
                        </div>
                        <div class="col-lg-6 float-end">
                            <form action="{{ route('class.class') }}">
                                <button type="submit" class="btn btn-danger me-2 btn-rounded float-end">Back</button>
                            </form>

                        </div>
                    </div>
                    <form class="forms-sample" action="{{ route('class.update_class') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Class</label>
                            <select name="class[]" class="form-control">
                                <option>Class 1</option>
                                <option>Class 2</option>
                                <option>Class 3</option>
                                <option>Class 4</option>
                                <option>Class 5</option>
                                <option>Class 6</option>
                                <option>Class 7</option>
                                <option>Class 8</option>
                                <option>Class 9</option>
                                <option>Class 10</option>
                                <option>Class 11</option>
                                <option>Class 12</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Section</label>
                            <select name="section[]" class="form-control">
                                <option>A</option>
                                <option>B</option>
                                <option>C</option>
                                <option>D</option>
                                <option>E</option>
                                <option>F</option>
                                <option>G</option>
                                <option>H</option>
                                <option>I</option>
                                <option>J</option>
                                <option>K</option>
                                <option>L</option>
                            </select>
                        </div>
                        {{-- <div class="form-group">
                        <label>Section</label>
                        <select name="section[]" class="form-control">
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                        </select>
                    </div> --}}
                        {{-- <div class="form-group">
                        <label for="exampleInputName1">Class Name</label>
                        <input name="name" type="text" class="form-control" id="exampleInputName1"
                            placeholder="Name" required>
                    </div> --}}
                        {{-- <div class="form-group">
                        <label for="exampleInputName1">Section Name</label>
                        <input name="secname" type="text" class="form-control" id="exampleInputName1"
                            placeholder="Name" required>
                    </div> --}}
                        <div class="form-group">
                            <label for="exampleInputMobile">Max Students Per Section</label>
                            <input name="student" type="number" class="form-control" id="exampleInputMobile"
                                placeholder="Maximum Student">
                        </div>
                        {{-- <div class="form-group">
                            <label>Gender</label>
                            <select name="gender[]" class="form-control">
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div> --}}
                        <button type="submit" class="btn btn-primary me-2 btn-rounded">ADD</button>
                        {{-- <div class="modal-footer">

                            <button type="submit" class="btn btn-primary btn-rounded">Update</button>
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
