<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grievance extends Model
{
    use HasFactory;

    protected $fillable = [
        'ugn', 
        'otp',
        'otp_sent_on',
        'grievance_raise_date',
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
        'support_document_path',
        'support_video_path',
        'grievance_description',
        'ip_address'
    ];

    public static $rules = [
        'enrolled_under_mmlsay'    => 'required',
        'pan_number'    => 'required',
        'full_name'     => 'required',
        'employment_type'    => 'required|in:EMPLOYEE,PENSIONER',
        'ppo_number'    => 'required_if:employment_type,==,PENSIONER',
        'gender'        => 'required',
        'district_id'       => 'required|exists:districts,id',
        'grievance_category_id'         => 'required|exists:grievance_categories,id',
        'address'           => 'required|max:1000',
        'support_document'         => 'mimes:jpg,jpeg,png,bmp,pdf|max:102400',
        'support_video'            => 'mimetypes:video/avi,video/mp4,video/mpeg,video/quicktime|max:102400',
        'grievance_description'       => 'required',
        'g-recaptcha-response' => 'recaptcha',
    ];

    public function district()
    {
        return $this->belongsTo('App\Models\Master\District', 'district_id');
    }

    public function grievance_category()
    {
        return $this->belongsTo('App\Models\Master\GrievanceCategory', 'grievance_category_id');
    }

    public function grievance_flows()
    {
        return $this->hasMany('App\Models\GrievanceFlow');
    }

}
