<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master\District;
use App\Models\Master\GrievanceCategory;
use App\Models\Grievance;
use App\Traits\ImageUploadTrait;
use App\Traits\VideoUploadTrait;
use App\Traits\SMSTrait;
use Validator, DB, Redirect, Msg91, Crypt;
class UserGrievancesController extends Controller
{

    use ImageUploadTrait, VideoUploadTrait, SMSTrait;

    public function raiseGrievance($gid) {
        $districts = District::orderBy('name')->get();
        $grievance_categories = GrievanceCategory::orderBy('name')->get();
        return view('frontend.raise_grievance', compact('districts', 'grievance_categories', 'gid'));
    }

    public function otpScreen() {
        return view('frontend.otp_screen');
    }

    public function otpVerify(Request $request) {
        $contact_number = $request->contact_number;
        $otp = $this->generateOTP(4);

        $this->validate($request,[
            'contact_number'  => 'required',
        ]);
        $data = [];
        $data['status'] = 'OTP Sent';
        $data['otp'] = $otp;
        $data['contact_number'] = $contact_number;
        $data['otp_sent_on'] = date('Y-m-d H:i:s');
        $data['ip_address']       = $this->getIp();

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
        
        $data['ugn'] = $ugn;

        DB::beginTransaction();
        $this->sendOTP($otp, $contact_number);
        $grievance = Grievance::create($data);
        DB::commit();
        toastr()->success('OTP sent successfully');
        $gid = $grievance->id;

        return view('frontend.otp_verify', compact('contact_number', 'gid'));
    }

    public function otpVerification(Request $request) {
        $gid = Crypt::decrypt($request->gid);
        $otp = $request->otp;

        $grievance = Grievance::find($gid);

        if($request->otp === $grievance->otp) {
            toastr()->success('OTP Verified successfully');

            $grievance->otp_verified_on = date('Y-m-d H:i:s');
            $grievance->save();

            $contact_number = $grievance->contact_number;

            return Redirect::route('grievance.raise', Crypt::encrypt($gid))->with(['message' => 'OTP Verified successfully', 'alert-class' => 'alert-success']);
        }
    }
    

    public function success(Request $request) {
        $ugn = $request->ugn;
        return view('frontend.grievance_success', compact('ugn'));
    }

    public function saveGrievance(Request $request) {

        $grievance = Grievance::findOrFail(Crypt::decrypt($request->gid));

        if(!$grievance->otp_verified_on != null) {
            return Redirect::route('grievance.otp_screen')->with(['message' => 'OTP Not Verified', 'alert-class' => 'alert-warning']);
        }

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
        $grievances['district_id']       = $request->district_id;
        $grievances['grievance_category_id']       = $request->grievance_category_id;
        $grievances['address']       = $request->address;
        $grievances['grievance_description']       = $request->grievance_description;
        
        

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

        
        $grievances['grievance_raise_date'] = date('Y-m-d H:i:s');

        try {
            DB::beginTransaction();
            $grievance->fill($grievances);
            $grievance->save();
            
            DB::commit();
            toastr()->success('Grievance registered successfully');

            return Redirect::route('grievance.success', ['ugn' => $grievance->ugn])->with(['message' => 'Grievance registered successfully', 'alert-class' => 'alert-success']);
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
}
