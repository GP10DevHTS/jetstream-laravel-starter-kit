<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestOrder extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];


    // eager load models 
    protected $with = ['lab_service', 'test_result'];

    // cast date
    protected $casts = [
        'created_at' => 'datetime',
    ];

    public static function search($query)
    {
        // filter results
        return empty($query)
            ? static::query()
            : static::where('order_number', 'like', '%' . $query . '%');
    }

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    public function lab_service(): BelongsTo
    {
        return $this->belongsTo(LabService::class);
    }

    public function test_result(): HasOne
    {
        return $this->hasOne(TestResult::class);
    }
}
