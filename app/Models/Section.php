<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $table = 'section_tbl';

    protected $fillable = [
        'name',
        'current_students',
        'max_students',
        'cid',
    ];
}
