<?php

namespace App\Http\Controllers\Sha;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Grievance;
use App\Models\GrievanceFlow;
use App\Models\GrievanceAttachment;
use App\Traits\ImageUploadTrait;
use Validator, DB, Redirect, Crypt;

class ShaGrievancesController extends Controller
{
    use ImageUploadTrait;

    public function index(Request $request) {
        $results = Grievance::orderBy('grievance_raise_date', 'DESC')->with('district', 'grievance_category')->whereNull('deleted_at')->paginate(1000);
        return view('sha.grievances.index', compact('results'));
    }

    public function view($id) {
        $result = Grievance::whereId($id)->with('district', 'grievance_category', 'grievance_flows', 'grievance_flows.sha_user', 'grievance_flows.isa_user')->first(); 
        return view('sha.grievances.view', compact('result'));
    }

    public function process(Request $request, $grievance_id) {

        $this->validate($request,[
            'action'        => 'required',
            'sha_remarks'   => 'required',
        ]);

        $action = $request->action;
        $sha_remarks = $request->sha_remarks;

        //add the flow
        $grievance_flow = [];
        $grievance_flow['grievance_id'] = $grievance_id;
        $grievance_flow['sha_user_id'] = auth()->user()->id;
        $grievance_flow['sha_remarks'] = $request->sha_remarks;

        $grievance = Grievance::find($grievance_id);
        $grievance->status = $action;
        $grievance->save();

        if($action == 'Forward To ISA') {
            $grievance_flow['isa_forward_date'] = date('Y-m-d H:i:s');
        }else{
            $grievance_flow['sha_resolve_date'] = date('Y-m-d H:i:s');
        }

        try {
            DB::beginTransaction();
                if($grievance_flow = GrievanceFlow::create($grievance_flow)) {
                    $grievance_attachments = [];
                    $grievance_attachments['grievance_flow_id'] = $grievance_flow->id;
                    if ($request->file('attachments')){
                        foreach($request->file('attachments') as $key => $file)
                        {
                            $attachment_path = $this->imageUpload($file, $directory = 'grievances/sha/images');

                            $grievance_attachments['attachment_path'] = $attachment_path;

                            GrievanceAttachment::create($grievance_attachments);
                        }
                    }
                }

                
            DB::commit();
        }catch(ValidationException $e)
        {
            dd(json_encode($e->getMessage()));
            return Redirect::back();
        }
        

        toastr()->success('Grievance Processed successfully');

        return Redirect::route('sha.grievance.index')->with(['message' => 'Grievance Processed', 'alert-class' => 'alert-success']);
    }

}
