<?php

namespace App\Http\Livewire\Admin\Teacher;

use App\Models\Teacher;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;


class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $value = Teacher::orderBy('id', 'ASC')->where('is_delete', '=', 0)->paginate(5);
        // $value = DB::table('Teacher')->orderBy('id', 'asc')->where('is_delete', '=', 0)->paginate(5);
        return view('livewire.admin.teacher.index', ['values' => $value]);
    }
}
