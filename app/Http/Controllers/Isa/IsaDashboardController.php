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
        $forwarded_to_isa = $this->forwardedToIsa();
        return view('layouts.backend.isa.home', compact('forwarded_to_isa'));
    }
}
