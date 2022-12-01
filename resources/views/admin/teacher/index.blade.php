@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Teacher</h4>
                    <form class="forms-sample" action="{{ url('admin/addteacher') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input name="name" type="text" class="form-control" id="exampleInputName1"
                                placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail3">Email address</label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail3"
                                placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword4">Password</label>
                            <input name="password" type="password" class="form-control" id="exampleInputPassword4"
                                placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputMobile">Mobile</label>
                            <input name="phone" type="number" class="form-control" id="exampleInputMobile"
                                placeholder="Mobile number">
                        </div>
                        <div class="form-group">
                            <label>Photo</label>
                            <input type="file" name="img" class="form-control">

                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1">Qualification</label>
                            <textarea name="qualification" class="form-control" id="exampleTextarea1" rows="4"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
