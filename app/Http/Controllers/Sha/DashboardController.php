<?php

namespace App\Http\Controllers\Sha;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\GrievanceTrait;
use Validator, DB, Redirect;
class DashboardController extends Controller
{
    use GrievanceTrait;

    public function dashboard() {
        $grievance_count = $this->grievanceCount();
        $out_tat = $this->grievanceOutTatCount();
        $resolved = $this->resolvedCount();
        $pending_at_isa = $this->pendingAtIsa();
        $unresolved = $this->unresolvedCount();
        $discarded = $this->discardedCount();
        return view('layouts.backend.sha.home', compact('grievance_count', 'out_tat', 'resolved', 'unresolved', 'discarded', 'pending_at_isa'));
    }
}
