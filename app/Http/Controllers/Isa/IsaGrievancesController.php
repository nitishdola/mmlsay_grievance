<?php

namespace App\Http\Controllers\Isa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Grievance;
use App\Models\GrievanceFlow;
use App\Models\GrievanceAttachment;
use App\Traits\ImageUploadTrait;
use Validator, DB, Redirect, Crypt;
class IsaGrievancesController extends Controller
{
    use ImageUploadTrait;

    public function index(Request $request) {
        $results = Grievance::orderBy('grievance_raise_date', 'DESC')->with('district', 'grievance_category')->where('status', 'Forward To ISA')->whereNull('deleted_at')->paginate(1000);
        return view('isa.grievances.index', compact('results'));
    }

    public function isaResolved(Request $request) {
        $results = Grievance::orderBy('grievance_raise_date', 'DESC')->with('district', 'grievance_category')->where('status', 'ISA Resolved')->whereNull('deleted_at')->paginate(1000);
        return view('isa.grievances.isa_resolved', compact('results'));
    }

    public function view($id) {
        $result = Grievance::whereId($id)->with('district', 'grievance_category', 'grievance_flows', 'grievance_flows.sha_user', 'grievance_flows.isa_user')->first(); 
        return view('isa.grievances.view', compact('result'));
    }

    public function process(Request $request, $grievance_id) {

        $this->validate($request,[
            'action'        => 'required',
            'isa_remarks'   => 'required',
        ]);

        $action = $request->action;
        $isa_remarks = $request->isa_remarks;

        //add the flow
        $grievance_flow = [];
        $grievance_flow['grievance_id'] = $grievance_id;
        $grievance_flow['isa_user_id'] = auth()->user()->id;
        $grievance_flow['isa_remarks'] = $request->isa_remarks;

        $grievance = Grievance::find($grievance_id);
        $grievance->status = $action;
        $grievance->save();

        $grievance_flow['isa_resolve_date'] = date('Y-m-d H:i:s');

        try {
            DB::beginTransaction();
                if($grievance_flow = GrievanceFlow::create($grievance_flow)) {
                    $grievance_attachments = [];
                    $grievance_attachments['grievance_flow_id'] = $grievance_flow->id;
                    if ($request->file('attachments')){
                        foreach($request->file('attachments') as $key => $file)
                        {
                            $attachment_path = $this->imageUpload($file, $directory = 'grievances/isa/images');

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
        

        toastr()->success('Grievance Forwarded to SHA successfully');

        return Redirect::route('isa.grievance.isa_resolved')->with(['message' => 'Grievance Forwarded to SHA successfully', 'alert-class' => 'alert-success']);
    }
}
