@foreach ($values as $data)
    <tr>
        <td>
            {{ $data->student_id }}
        </td>
        <td>
            <img src="{{ asset('uploads/student/' . $data->img) }}" width="100px" height="170px" alt="Image" />
        </td>
        <td>
            {{ $data->fname }}
        </td>
        <td>
            {{ $data->className }}
        </td>
        <td>
            {{ $data->sectionName }}
        </td>
        <td>
            {{ $data->email }}
        </td>

        {{-- <td>
                                            {{ $data->status == 1 ? 'Active' : 'In Active' }}
                                        </td>
                                        <td>
                                            @if ($data->gender == 1)
                                                Male
                                            @else
                                                Female
                                            @endif
                                        </td> --}}
        <td>
            @if (Auth::user()->role_as == 0 or Auth::user()->role_as == 1)
                <a href="" class="mdi mdi-eye mdi-24px" style="color: rgb(99, 104, 103)"></a>
                <a href="" class="mdi mdi-account-edit mdi-24px" style="color: rgb(80, 225, 80)"></a>
                <a href="" class="mdi mdi-delete mdi-24px" style="color: rgb(250, 32, 32)"></a>
            @else
                <a href="" class="mdi mdi-eye mdi-24px" style="color: rgb(99, 104, 103)"></a>
            @endif
        </td>
@endforeach
