<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketModel extends Model
{
    use HasFactory;
    protected $table = 'ticket';
    public $timestamps = false;
    protected $fillable = [
        'passenger_type',
        'first_name',
        'last_name',
        'passport',
        'airline',
        'business',
        'pnr',
        'base_fare',
        'tax',
        'margin',
        'sale_price',
        'total',
        'client_comment',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'is_deleted',
        
    ];
}


