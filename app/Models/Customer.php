<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'full_name',
        'email',
        'phone_number',
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function getFullName(): string
    {
        return $this->full_name;
    }

    public function getTicketsCount(): int
    {
        return $this->tickets()->count();
    }

}
