<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelModel extends Model
{
    use HasFactory;
    protected $table = 'hotel';
    public $timestamps = false;
    protected $fillable = [
        'status',
        'hotel_name',
        'rate_per_day',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'is_deleted',
        
    ];
}
