<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisaModel extends Model
{
    use HasFactory;
    protected $table = 'visa';
    public $timestamps = false;
    protected $fillable = [
        'status',
        'country',
        'category',
        'amount',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'is_deleted',
        
    ];
}
