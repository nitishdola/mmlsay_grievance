<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Validator, DB, Redirect, Msg91;
trait SMSTrait {

    /**
     * @param Request $request
     * @return $this|false|string
     */
    public function sendOTP($otp, $mobile_number) {
      Msg91::sms()->to(['91'.$mobile_number])->flow('66581bccd6fc053e4f040213')
                                ->variable('var1', $otp)
                                ->send();
    }

    public function generateOTP($digits) {
      return rand(pow(10, $digits-1), pow(10, $digits)-1);
    }

    public function sendGrievanceRaisedSMS($mobile_number, $name, $reference_number) {
      Msg91::sms()->to(['91'.$mobile_number])->flow('66614c43d6fc05424a3af462')
                                ->variable('var1', $name)
                                ->variable('var2', $reference_number)
                                ->send();
    }

    public function sendGrievanceResolvedSMS($mobile_number, $name, $reference_number) {
      Msg91::sms()->to(['91'.$mobile_number])->flow('66614befd6fc0531d61d57b2')
                                ->variable('var1', $name)
                                ->variable('var2', $reference_number)
                                ->send();
    }

  }