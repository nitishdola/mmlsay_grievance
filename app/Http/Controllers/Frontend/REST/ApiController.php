<?php

namespace App\Http\Controllers\Frontend\REST;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Http;

class ApiController extends Controller
{
    public function getBeneficiaryData(Request $request) {
        //121183
        $param['type']      = "MEMBER";  
        $param['value']     = $request->member_id;  
        $account_id = env('MMLSAY_ACCOUNT_ID');
        $api_key = env('MMLSAY_API_KEY');    
        $url = 'https://aaa-backend.assam.statedatacenter.in/beneficiary/WmAB9fTCLhDAMeMLsoCma53HnrNiQWgG';

        $response = Http::withHeaders([
            'account-id'    => $account_id,
            'api-key'       => $api_key,

        ])->withBody(json_encode($param),'application/json')->post($url);

        return $response;
    }
}
