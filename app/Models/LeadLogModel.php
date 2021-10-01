<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadLogModel extends Model
{
    use HasFactory;
    protected $table = 'lead_log';
    public $timestamps = false;
    protected $fillable = [
        'lead_id',
        'date',
        'response_status',
        'remarks',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'is_deleted',
        
    ];
}
