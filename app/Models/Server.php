<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Server extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'ip_server',
    ];

    public function cameras(): BelongsToMany
    {
        return $this->belongsToMany(Camera::class);
    }

    public function titles(): BelongsToMany
    {
        return $this->belongsToMany(Title::class);
    }
}