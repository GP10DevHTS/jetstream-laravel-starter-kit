<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Models\Permission;

class Module extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];
    protected $with = ['permissions'];

    public function permissions(): HasMany
    {
        return $this->hasMany(Permission::class);
    }
}
