<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteScenesModel extends Model
{
    use HasFactory;
    protected $table = 'site_scene';
    public $timestamps = false;
    protected $fillable = [
        'lead_id',
        'amount',
        'description',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'is_deleted',
        
    ];
}
