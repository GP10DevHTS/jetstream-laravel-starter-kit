<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class LabServiceCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['category_name', 'user_id'];

    protected $casts = ['created_at' => 'datetime'];

    public static function search($query)
    {
        // filter results
        return empty($query)
            ? static::query()
            : static::where('category_name', 'like', '%' . $query . '%');
    }

    public function lab_services(): HasMany
    {
        return $this->hasMany(LabService::class);
    }
}
