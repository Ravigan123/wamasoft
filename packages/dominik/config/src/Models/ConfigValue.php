<?php

namespace Dominik\Config\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ConfigValue extends Model
{
    use HasFactory;


    public function configKeys(): BelongsTo
    {
        return $this->belongsTo(ConfigKey::class);
    }
}