<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'phone_number',
        'address',
        'city',
        'zip_code',
        'country',
    ];

    public function getUser()
    {
        return User::find($this->user_id);
    }

}
