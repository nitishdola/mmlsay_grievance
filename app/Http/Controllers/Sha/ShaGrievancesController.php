<?php

namespace App\Http\Controllers\Sha;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Grievance;

class ShaGrievancesController extends Controller
{
    public function index(Request $request) {
        $results = Grievance::orderBy('grievance_raise_date', 'DESC')->with('district', 'grievance_category')->whereNull('deleted_at')->paginate(1000);
        return view('sha.grievances.index', compact('results'));
    }

    public function view($id) {
        $result = Grievance::whereId($id)->with('district', 'grievance_category')->first();
        return view('sha.grievances.view', compact('result'));
    }

}
