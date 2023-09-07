<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PaymentMethod extends Model
{
    use HasFactory;

    protected $fillable = ['method'];

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function payment_service_providers(): HasMany
    {
        return $this->hasMany(PaymentServiceProvider::class);
    }
}
