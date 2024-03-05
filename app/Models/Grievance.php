<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grievance extends Model
{
    use HasFactory;

    protected $fillable = [
        'ugn', 
        'status',
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
        'grievance_description',
        'ip_address'
    ];

    public static $rules = [
        'ugn'       => 'required|unique:grievances|max:255',
        'status'    => 'required',
        'enrolled_under_mmlsay'    => 'required',
        'member_id'     => 'required',
        'pan_number'    => 'required',
        'full_name'     => 'required',
        'employment_type'    => 'required|in:EMPLOYEE,PENSIONER',
        'ppo_number'    => 'required_if:employment_type,==,PENSIONER',
        'gender'        => 'required',
        'contact_number'    => 'required',
        'district_id'       => 'required|exists:districts,id',
        'grievance_category_id'         => 'required|exists:grievance_categories,id',
        'address'           => 'required|max:1000',
        'support_document_file'         => 'required',
        'support_video_file'            => 'required',
        'grievance_description'       => 'required',
        'ip_address'       => 'required',
    ];

    public function district()
    {
        return $this->belongsTo('App\Models\Master\District', 'district_id');
    }

    public function grievance_category()
    {
        return $this->belongsTo('App\Models\Master\GrievanceCategory', 'grievance_category_id');
    }

}
