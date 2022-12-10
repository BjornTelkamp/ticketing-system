<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    /**
     * Get the tickets that are associated with the customer.
     * @return HasMany
     */
    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }

    /**
     * Get the full name of the customer.
     * @return string
     */
    public function getFullName(): string
    {
        return $this->full_name;
    }

    /**
     * Get the ticket count of the customer.
     * @return int
     */
    public function getTicketsCount(): int
    {
        return $this->tickets()->count();
    }

}
