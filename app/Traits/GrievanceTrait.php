<?php

namespace App\Traits;

use Illuminate\Http\Request;
use App\Models\Grievance;
use DateTime;

trait GrievanceTrait {

    /**
     * @param Request $request
     * @return $this|false|string
     */
    public function grievanceCount() {
      return Grievance::count();
    }

    public function grievanceOutTatCount() {
      $date = new DateTime(date('Y-m-d'));

      $date->modify('-8 day'); 
      $g_date = $date->format('Y-m-d');

      return Grievance::where('grievance_raise_date', '<=', $g_date)->where('status', '!=', 'resolved')->count();
    }

    public function resolvedCount() {

      return Grievance::where('status', 'resolved')->count();
    }


    public function forwardedToIsa() {

      return Grievance::where('status', 'Forward To ISA')->count();
    }

    public function resolvedAtIsa() {

      return Grievance::where('status', 'ISA Resolved')->count();
    }

    

}