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
    public function allGrievancesDetails($status = null) {
      $where = [];
      if($status != null) {
        $where['status'] = $status;
      }

      $where['status'] = $status;

      return Grievance::orderBy('grievance_raise_date', 'DESC')->where('otp_verified_on', '!=', null )->with('district', 'grievance_category')->where($where)->whereNull('deleted_at')->paginate(1000);
    }

    public function viewGrievance($id) {
      return Grievance::whereId($id)->with('district', 'grievance_category', 'grievance_flows', 'grievance_flows.sha_user', 'grievance_flows.isa_user')->first(); 
    }

    public function grievanceCount() {
      return Grievance::where('otp_verified_on', '!=', null )->count();
    }

    public function grievanceOutTatCount() {
      $date = new DateTime(date('Y-m-d'));

      $date->modify('-8 day'); 
      $g_date = $date->format('Y-m-d');

      return Grievance::where('grievance_raise_date', '<=', $g_date)->where('otp_verified_on', '!=', null )->where('status', '!=', 'resolved')->count();
    }

    public function grievanceOutTatDetails() {
      $date = new DateTime(date('Y-m-d'));

      $date->modify('-8 day'); 
      $g_date = $date->format('Y-m-d');

      return Grievance::where('grievance_raise_date', '<=', $g_date)->where('otp_verified_on', '!=', null )->where('status', '!=', 'resolved')->paginate(1000);
    }


    public function resolvedCount() {

      return Grievance::where('status', 'resolved')->count();
    }

    public function discardedCount() {

      return Grievance::where('status', 'Discard')->count();
    }

    public function discardedDetails() {

      return Grievance::where('status', 'Discard')->paginate(1000);
    }

    public function unresolvedCount() {

      return Grievance::where('status', '!=', 'resolved')->where('status', '!=', 'Discard')->where('otp_verified_on', '!=', null )->count();
    }

    public function usresolvedDetails() {

      return Grievance::where('status', '!=', 'resolved')->where('status', '!=', 'Discard')->where('otp_verified_on', '!=', null )->paginate(1000);
    }

    public function forwardedToIsa() {

      return Grievance::where('status', 'Forward To ISA')->count();
    }

    public function pendingAtSha() {
      return Grievance::whereIn('status', ['Grievance Registered', 'ISA Resolved'])->count();
    }

    public function pendingAtShaDetails() {
      return Grievance::whereIn('status', ['Grievance Registered', 'ISA Resolved'])->paginate(1000);
    }

    public function resolvedAtIsa() {

      return Grievance::where('status', 'ISA Resolved')->count();
    }


    

}