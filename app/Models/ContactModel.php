<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactModel extends Model
{
    use HasFactory;
    protected $table = 'contact';
    public $timestamps = false;
    protected $fillable = [

        'first_name',
        'last_name',
        'phone_num',
        'email',
        'phone_num_1',
        'address',
        'city',
        'entry_date',
        'manager_id',
        'caller_id',
        'status',
        'response_status',
        'remarks',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'is_deleted',
        
    ];
}
