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

      return Grievance::orderBy('grievance_raise_date', 'DESC')->whereNotIn('status', ['OTP Sent', 'OTP Verified'] )->with('district', 'grievance_category')->where($where)->whereNull('deleted_at')->paginate(1000);

    }

    public function viewGrievance($id) {
      return Grievance::whereId($id)->with('district', 'grievance_category', 'grievance_flows', 'grievance_flows.sha_user', 'grievance_flows.isa_user')->first(); 
    }

    public function grievanceCount() {
      return Grievance::whereNotIn('status', ['OTP Sent', 'OTP Verified'] )->count();
    }

    public function grievanceOutTatCount() {
      $date = new DateTime(date('Y-m-d'));

      $date->modify('-8 day'); 
      $g_date = $date->format('Y-m-d');

      return Grievance::where('grievance_raise_date', '<=', $g_date)->whereNotIn('status', ['OTP Sent', 'OTP Verified', 'ISA Resolved', 'SHA Resolved'] )->count();
    }

    public function grievanceOutTatDetails() {
      $date = new DateTime(date('Y-m-d'));

      $date->modify('-8 day'); 
      $g_date = $date->format('Y-m-d');

      return Grievance::where('grievance_raise_date', '<=', $g_date)->whereNotIn('status', ['OTP Sent', 'OTP Verified', 'ISA Resolved', 'SHA Resolved'] )->paginate(1000);
    }


    public function resolvedCount() {

      return Grievance::whereIn('status', ['ISA Resolved', 'SHA Resolved'])->count();
    }

    public function resolvedDetails() {

      return Grievance::whereIn('status', ['ISA Resolved', 'SHA Resolved'])->paginate(1000);
    }

    public function discardedCount() {

      return Grievance::wherein('status', ['Discard at SHA', 'Discard at ISA'])->count();
    }

    public function discardedDetails() {

      return Grievance::wherein('status', ['Discard at SHA', 'Discard at ISA'])->paginate(1000);
    }

    public function unresolvedCount() {

      return Grievance::whereNotIn('status', ['OTP Sent', 'OTP Verified', 'ISA Resolved', 'SHA Resolved', 'Discard at ISA', 'Discard at SHA'] )->count();
    }

    public function usresolvedDetails() {

      return Grievance::whereNotIn('status', ['OTP Sent', 'OTP Verified', 'ISA Resolved', 'SHA Resolved', 'Discard at ISA', 'Discard at SHA'] )->paginate(1000);
    }

    public function pendingAtIsa() {
      return Grievance::whereIn('status', ['Grievance Registered', 'Forward To ISA'])->count();
    }

    public function allIsaCases() {
      return Grievance::whereIn('status', ['Grievance Registered', 'ISA Resolved', 'Discarded at ISA', 'Forward To ISA'])->count();
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