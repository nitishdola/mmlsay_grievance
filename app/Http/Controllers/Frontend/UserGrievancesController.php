<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master\District;
use App\Models\Master\GrievanceCategory;
use App\Models\Grievance;
use App\Traits\ImageUploadTrait;
use App\Traits\VideoUploadTrait;
use Validator, DB, Redirect;
class UserGrievancesController extends Controller
{

    use ImageUploadTrait, VideoUploadTrait;

    public function raiseGrievance() {
        $districts = District::orderBy('name')->get();
        $grievance_categories = GrievanceCategory::orderBy('name')->get();
        return view('frontend.raise_grievance', compact('districts', 'grievance_categories'));
    }

    public function success(Request $request) {
        $ugn = $request->ugn;
        return view('frontend.grievance_success', compact('ugn'));
    }

    public function saveGrievance(Request $request) {
        $grievances = [];

        $validator = Validator::make($request->all(), Grievance::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        $grievances['status']       = 'Grievance Registered';
        $grievances['enrolled_under_mmlsay'] = $request->enrolled_under_mmlsay;
        $grievances['member_id']    = $request->member_id;
        $grievances['pan_number']   = $request->pan_number;
        $grievances['full_name']    = $request->full_name;
        $grievances['employment_type']          = $request->employment_type;
        $grievances['ppo_number']   = $request->ppo_number;
        $grievances['gender']       = $request->gender;
        $grievances['contact_number']    = $request->contact_number;
        $grievances['district_id']       = $request->district_id;
        $grievances['grievance_category_id']       = $request->grievance_category_id;
        $grievances['address']       = $request->address;
        $grievances['grievance_description']       = $request->grievance_description;
        $grievances['ip_address']       = $this->getIp();
        
        

        if($request->hasFile('support_document')) { 
            $file = $request->support_document;
            $grievances['support_document_path'] = $this->imageUpload($file, $directory = 'grievances/user/images');
        }

        if($request->hasFile('support_video')) { 
            $file = $request->support_video;
            $grievances['support_video_path'] = $this->videoUpload($file, $directory = 'grievances/user/videos');
        }
        $latest_ugn_number = '';


        $nexr_grievance_sl = '';

        if(Grievance::count()) {
            $last_grievance = Grievance::orderBy('created_at', 'desc')->limit(1)->first();
            $last_grievance_arr = explode("/", $last_grievance);
            $last_grievance_sl = (int)$last_grievance_arr[3];
            $nexr_grievance_sl = $last_grievance_sl + 1;
            $nexr_grievance_sl = sprintf("%02d", $nexr_grievance_sl);
        }else{
            $nexr_grievance_sl = '01';
        }

        $ugn = 'MMLSAY/GRV/'.date('Ymd').'/'.$nexr_grievance_sl;
        
        $grievances['ugn'] = $ugn;
        $grievances['grievance_raise_date'] = date('Y-m-d H:i:s');

        try {
            DB::beginTransaction();
            Grievance::create($grievances);
            DB::commit();
            toastr()->success('Grievance registered successfully');

            return Redirect::route('grievance.success', ['ugn' => $ugn])->with(['message' => 'Grievance registered successfully', 'alert-class' => 'alert-success']);
        }catch(ValidationException $e)
        {
            return Redirect::back();
        }
        

        
    }

    public function getIp(){
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
            if (array_key_exists($key, $_SERVER) === true){
                foreach (explode(',', $_SERVER[$key]) as $ip){
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                        return $ip;
                    }
                }
            }
        }
        return request()->ip(); // it will return the server IP if the client IP is not found using this method.
    } 


    public function trackGrievance(Request $request) {
        $data = [];
        if($request->error_message == 'yes'){
            if($request->ugn) {
                $data['success'] = false;
                $record = Grievance::whereUgn($request->ugn);
                $data['ugn']        = $request->ugn;

                if($record->count()) {
                    $data['success']    = true;
                    $data['status']     = $record->first()->status;
                }else{
                    $data['error_message'] = 'Invalid Grievance Registration Number entered.';
                }

            }else{
                $data['error_message'] = 'Grievance Registration Number is required';
            }
        }
        return view('frontend.track_grievance', compact('data'));
    }

    public function sendOTP() {
        
    }
}
