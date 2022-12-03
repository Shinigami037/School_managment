@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Teacher</h4>
                    <form action="{{ route('teacher.update', ['tid' => $tid->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input name="name" type="text" value="{{ $tid->name }}" class="form-control"
                                id="exampleInputName1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail3">Email address</label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail3"
                                value="{{ $tid->email }}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputMobile">Mobile</label>
                            <input name="phone" type="tel" class="form-control" id="exampleInputMobile"
                                value="{{ $tid->phone }}">
                        </div>
                        <div class="form-group">
                            <label>Photo</label>
                            <input type="file" name="img" class="form-control">
                            <img src="{{ asset('uploads/teacher/' . $tid->img) }}" alt="" width="170px"
                                height="160px">
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1">Qualification</label>
                            <textarea name="qualification" class="form-control" id="exampleTextarea1" rows="4">{{ $tid->qualification }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">Status</label>
                            <select name="status[]" class="form-control" id="exampleFormControlSelect2">
                                @if ($tid->status == 1)
                                    <option>Active</option>
                                @else
                                    <option>In Active</option>
                                @endif
                                <option>Active</option>
                                <option>In Active</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
