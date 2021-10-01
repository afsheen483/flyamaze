<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallerLogModel extends Model
{
    use HasFactory;
    protected $table = 'caller_log';
    public $timestamps = false;
    protected $fillable = [
        'contact_id',
        'contact',
        'caller_name',
        'response_status',
        'remarks',
        'visa_info',
        'ticket_info',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'is_deleted',
        
    ];
}
