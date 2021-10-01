<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransportModel extends Model
{
    use HasFactory;
    protected $table = 'transports';
    public $timestamps = false;
    protected $fillable = [
        'status',
        'vehicle',
        'rate_per_hour',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'is_deleted',
        
    ];
}
