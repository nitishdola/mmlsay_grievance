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
        $account_id = '4DE12A3AD964B85C6A6B626D9232C'; 
        $api_key = 'JVrzScOQpcyz7JSrp6721rnB2rNkeGbSzdsvpFhzFAYqiSrX3LXaujpaFCh0MJy9BsDJKjWWciU2Fxyr0qZc894FxHNdhwGguYJS4coqmh3SqzcX5hFAS4IMBoDfZevh';    
        $url = 'https://aaa-backend.assam.statedatacenter.in/beneficiary/WmAB9fTCLhDAMeMLsoCma53HnrNiQWgG';

        $response = Http::withHeaders([
            'account-id'    => $account_id,
            'api-key'       => $api_key,

        ])->withBody(json_encode($param),'application/json')->post($url);

        return $response;
    }
}
