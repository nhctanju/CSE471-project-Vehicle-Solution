<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    use HasFactory;

    // Add all fillable fields including 'instructions'
    protected $fillable = [
        'customer_id',
        'service_type',
        'duration_minutes',
        'instructions',
        'status',
        'estimated_cost',
        'cancellation_reason',
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function driverAssignment()
    {
        return $this->hasOne(DriverAssignment::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
