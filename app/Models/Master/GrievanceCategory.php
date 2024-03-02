<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class GrievanceCategory extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name', 
    ];

    public static $rules = [
        'name' => 'required', 
    ];

}
