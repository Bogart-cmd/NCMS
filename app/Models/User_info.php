<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_info extends Model
{
    use HasFactory;
    protected $table = "users";
    protected $fillable = [
        "fname",
        "lname",
        "email",
        "username",
        "password",
        "decrypt",
        "usertype"
    ];
}
