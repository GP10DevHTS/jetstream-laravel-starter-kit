<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Spacemen extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'spacemen'];

    protected $casts = ['created_at' => 'datetime'];

    public static function search($query)
    {
        // filter results
        return empty($query)
            ? static::query()
            : static::where('spacemen', 'like', '%' . $query . '%');
    }

    public function test_results(): BelongsToMany
    {
        return $this->belongsToMany(TestResult::class);
    }
}
