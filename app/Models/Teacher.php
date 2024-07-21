<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use SoftDeletes;

    public $table = 'teachers';

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'kra_pin',
        'subjects'
    ];

    protected $casts = [
        'id' => 'string',
        'name' => 'string',
        'email' => 'string',
        'phone_number' => 'string',
        'kra_pin' => 'string',
        'subjects' => 'integer'
    ];

    public static array $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:teachers,email',
        'phone_number' => 'required',
        'subjects' => 'nullable|integer'
    ];
}
