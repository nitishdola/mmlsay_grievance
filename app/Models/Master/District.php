<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class District extends Model
{
    
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'lgd_code'
    ];

    public static $rules = [
        'name' => 'required', 
        'lgd_code' => 'required'
    ];

    public function district()
    {
        return $this->belongsTo('App\Models\Master\District', 'district_id');
    }


    public function case_details()
    {
        return $this->hasMany('App\Models\CaseDetails', 'hospital_id');
    }

}
