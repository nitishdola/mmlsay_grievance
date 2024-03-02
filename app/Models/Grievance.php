<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grievance extends Model
{
    use HasFactory;

    protected $fillable = [
        'ugn', 
        'enrolled_under_mmlsay',
        'member_id',
        'pan_number',
        'full_name',
        'employment_type',
        'ppo_number',
        'gender',
        'contact_number',
        'district_id',
        'grievance_category_id',
        'address',
        'support_document_file',
        'support_video_file',
        'grievance_description'
    ];

    public static $rules = [
        'name' => 'required', 
        'lgd_code' => 'required'
    ];

    public function district()
    {
        return $this->belongsTo('App\Models\Master\District', 'district_id');
    }

}
