<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    /**
     * Get the tickets that are associated with the employee.
     * @return BelongsToMany
     */
    public function tickets() : BelongsToMany
    {
        return $this->belongsToMany(Ticket::class);
    }

    /**
     * Get the user that's associated with the employee.
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the full name of the employee.
     * @return string
     */
    public function getFullName(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

}
