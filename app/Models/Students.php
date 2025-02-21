<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Students extends Model
{
    use HasFactory;
    protected $table = "students";
    protected $fillable = [
        "id_course", // NOTE FOR DEV: course is retrieved from the Programs table by their ID number
        "fname",
        "mname",
        "lname",
        "sname",
        "region",
        "province",
        "street_number",
        "city",
        "district",
        "zipcode",
        "nationality",
        "contact_number",
        "email",
        "gender",
        "civil_status",
        "education",
        "employment",
        "status", // 0-pending, 1-accepted, 2-declined
        "birthdate",
        "birthplace",
    ];

    protected $casts = [
        'status' => 'integer', // to ensure status is always an integer
    ];

    public function parent(){
        return $this->hasOne(Parents::class);
    }

    public function classification(){
        return $this->hasMany(Classification::class);
    }

    public function program(){
        return $this->hasOne(Programs::class, 'id', 'id_course');
    }


}
