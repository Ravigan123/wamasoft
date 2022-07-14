<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CameraValue extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'cameraServer_id', 
        'date',
        'status',
        
    ];

    public function cameraServers(): BelongsTo
    {
        return $this->belongsTo(CameraServer::class);
    }
}
