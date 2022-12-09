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
                            <h4 class="card-title">Edit Class</h4>
                        </div>

                        <div class="col-lg-6 float-end">
                            <form action="{{ route('class.class') }}">
                                <button type="submit" class="btn btn-danger me-2 btn-rounded float-end">Back</button>
                            </form>
                        </div>
                    </div>
                    <form class="forms-sample" action="{{ route('class.class_edit', ['id' => $values->sid]) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Class:</label>
                            <p>{{ $values->className }}</p>
                        </div>
                        <div class="form-group">
                            <label>Section:</label>
                            <p>{{ $values->name }}</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputMobile">Max Students Per Section</label>
                            <input name="student" type="number" class="form-control" id="exampleInputMobile"
                                value="{{ $values->max_students }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary me-2 btn-rounded">UPDATE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
