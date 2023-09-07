<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResultOption extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['option', 'code', 'symbol', 'user_id'];

    public static function search($query)
    {
        // filter results
        return empty($query)
            ? static::query()
            : static::where('option', 'like', '%' . $query . '%');
    }

    // Get all of the test_requsets for the Patient
    public function test_requsets(): HasMany
    {
        return $this->hasMany(TestRequst::class);
    }


    public function lab_services(): BelongsToMany
    {
        return $this->belongsToMany(LabService::class);
    }
}
