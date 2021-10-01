<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransportLeadModel extends Model
{
    use HasFactory;
    protected $table = 'transport_lead';
    public $timestamps = false;
    protected $fillable = [
        'transport_id',
        'lead_id',
        'psf',
        'amount',
        'sale_price',
        'days',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'is_deleted',
        
    ];
}
