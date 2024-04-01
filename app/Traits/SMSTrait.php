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
      Msg91::sms()->to(['91'.$mobile_number])->flow('62d4f96554f44b38077a936e')
                                ->variable('OTP', $otp)
                                ->send();
    }

    public function generateOTP($digits) {
      return rand(pow(10, $digits-1), pow(10, $digits)-1);
    }

    public function sendGrievanceRaisedSMS($mobile_number, $name, $subject, $reference_number) {
      Msg91::sms()->to(['91'.$mobile_number])->flow('66041fa1d6fc053a881f9af3')
                                ->variable('var1', $name)
                                ->variable('var2', $subject)
                                ->variable('var3', $reference_number)
                                ->send();
    }

    public function sendGrievanceResolvedSMS($mobile_number, $name, $subject, $reference_number) {
      Msg91::sms()->to(['91'.$mobile_number])->flow('66041fd0d6fc055066580192')
                                ->variable('var1', $name)
                                ->variable('var2', $subject)
                                ->variable('var3', $reference_number)
                                ->send();
    }

  }