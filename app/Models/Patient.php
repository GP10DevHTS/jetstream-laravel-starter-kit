<?php

namespace App\Models;

use Attribute;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    // eager load models
    protected $with = ['patient_visits', 'test_results'];

    //Accessor for Age.
    public function ageFromDob()
    {
        return Carbon::parse($this->attributes['date_of_birth'])->age;
    }

    public static function search($query)
    {
        // filter results
        return empty($query)
            ? static::query()
            : static::where('full_name', 'like', '%' . $query . '%');
    }

    // create relationships
    public function patient_visits(): HasMany
    {
        return $this->hasMany(PatientVisit::class);
    }

    public function test_results(): HasMany
    {
        return $this->hasMany(TestResult::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }
}
