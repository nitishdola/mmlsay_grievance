<?php

namespace App\Http\Controllers\Isa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\GrievanceTrait;
use Validator, DB, Redirect;
class IsaDashboardController extends Controller
{
    use GrievanceTrait;

    public function dashboard() {
        $pending_at_isa = $this->pendingAtIsa();
        $all_isa_cases = $this->allIsaCases();
        return view('layouts.backend.isa.home', compact('pending_at_isa', 'all_isa_cases'));
    }
}
