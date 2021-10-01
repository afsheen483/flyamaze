<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelLeadModel extends Model
{
    use HasFactory;
    protected $table = 'hotel_lead';
    public $timestamps = false;
    protected $fillable = [
        'lead_id',
        'hotel_name',
        'days',
        'rate',
        'amount',
        'package',
    ];
        
}
