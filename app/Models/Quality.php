<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Quality extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'serverTitle_id', 
        'date',
        'key',
        'worth',
        
    ];

    public function serverTitles(): BelongsTo
    {
        return $this->belongsTo(ServerTitle::class);
    }
}