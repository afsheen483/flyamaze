<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadModel extends Model
{
    use HasFactory;
    protected $table = 'lead';
    public $timestamps = false;
    protected $fillable = [
        'client_id',
        'created_at',
        'remarks',
        'created_by',
        'updated_at',
        'updated_by',
        'is_deleted',
        
    ];
}
