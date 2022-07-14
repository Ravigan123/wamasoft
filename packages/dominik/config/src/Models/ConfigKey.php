<?php

namespace Dominik\Config\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ConfigKey extends Model
{
    use HasFactory;

    public function configValues(): HasMany
    {
        return $this->HasMany(ConfigValue::class);
    }
}