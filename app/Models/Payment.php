<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['patient_id', 'payment_amount', 'payment_balance', 'payment_status', 'payment_method_id', 'total_amount_due'];

    protected $casts = ['created_at' => 'datetime'];

    // fetch the patient that has this payment
    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    public function test_results(): BelongsToMany
    {
        return $this->belongsToMany(TestResult::class);
    }

    public function payment_methods(): BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class);
    }
}
