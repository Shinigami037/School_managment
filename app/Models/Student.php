<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'student';

    protected $fillable = [
        'lname',
        'sec_email',
        'student_id',
        'phone',
        'gender',
        'img',
        'address',
        'state',
        'city',
        'zip',
        'birth_date',
        'is_delete',
        'cid',
        'sid',
    ];

    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];
}
