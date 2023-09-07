<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class LabService extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['service_name', 'user_id', 'price', 'lab_service_category_id', 'result_id'];

    protected $casts = ['created_at' => 'datetime'];

    protected $with = ['lab_service_category', 'result_options'];

    public static function search($query)
    {
        // filter results
        return empty($query)
            ? static::query()
            : static::where('service_name', 'like', '%' . $query . '%');
    }

    public function result_options(): BelongsToMany
    {
        return $this->belongsToMany(ResultOption::class);
    }

    public function lab_service_category(): BelongsTo
    {
        return $this->belongsTo(LabServiceCategory::class);
    }

    public function test_orders(): HasMany
    {
        return $this->hasMany(TestOrder::class);
    }
}
