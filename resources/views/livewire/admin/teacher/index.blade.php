<div class="row">
    <div class="col-lg-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Teacher's table</h4>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Qualification</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Gender</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($values as $data)
                                <tr>
                                    <td>
                                        {{ $data->id }}
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
                                        <a href="{{ url('admin/teacher/' . $data->id . '/edit') }}"
                                            class="btn btn-success">Edit</a>
                                        <a href="{{ route('teacher.delete', ['tid' => $data->id]) }}"
                                            class="btn btn-danger">Delete</a>
                                    </td>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        {{ $values->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
