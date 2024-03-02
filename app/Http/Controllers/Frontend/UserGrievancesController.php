<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master\District;
use App\Models\Master\GrievanceCategory;

class UserGrievancesController extends Controller
{
    public function raiseGrievance() {
        $districts = District::orderBy('name')->get();
        $grievance_categories = GrievanceCategory::orderBy('name')->get();
        return view('frontend.raise_grievance', compact('districts', 'grievance_categories'));
    }

    public function saveGrievance(Request $request) {
        dd($request->all());
    }
}
