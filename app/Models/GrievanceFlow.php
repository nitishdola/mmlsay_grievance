<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrievanceFlow extends Model
{
    use HasFactory;

    protected $fillable = [
        'grievance_id', 
        'sha_user_id',
        'isa_user_id',
        'open_date',
        'isa_forward_date',
        'isa_resolve_date',
        'sha_resolve_date',
        'isa_remarks',
        'sha_remarks',
    ];
}
