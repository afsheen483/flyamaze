<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisaLeadModel extends Model
{
    use HasFactory;
    protected $table = 'visa_lead';
    public $timestamps = false;
    protected $fillable = [
        'visa_id',
        'lead_id',
        'psf',
        'sale_price',
        'comments',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'is_deleted',
        
    ];
}
