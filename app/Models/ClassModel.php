<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;
    protected $table = 'class';

    protected $fillable = [
        'name',
        'section',
        'max_value',
        'current_value',
    ];
}
