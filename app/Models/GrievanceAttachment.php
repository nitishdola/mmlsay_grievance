<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrievanceAttachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'grievance_flow_id', 
        'attachment_path',
    ];
}
