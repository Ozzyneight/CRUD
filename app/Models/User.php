<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'users';
    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'email',
        'date_of_birthday',
        'password'
    ];
    protected $casts = [
        'password' => 'hashed',
    ];
}
